<?php

namespace App\Models;

use App\Models\Prompt\Prompt;
use App\Models\Submission\Submission;
use App\Services\LimitManager;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Config;
use App\Models\TemplateTag;
use Illuminate\Support\Facades\Blade;

class Model extends EloquentModel {
    /**
     * Whether the model contains timestamps to be saved and updated.
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * For theme tags, we always check if a model has the parsed_text attribute.
     * If so, we load all the necessary data and replace the theme tag with its content.
     */
    public function getParsedTextAttribute() {
        if(isset($this->attributes['parsed_text'])){
            return $this->getTemplatedText($this->attributes['parsed_text']);
        } else {
            //return empty if the attribute isnt set.
            return '';
        }
    }

    /**
     * For theme tags, we always check if a model has the parsed_description attribute.
     * If so, we load all the necessary data and replace the theme tag with its content.
     */
    public function getParsedDescriptionAttribute() {
        if(isset($this->attributes['parsed_description'])){
            return $this->getTemplatedText($this->attributes['parsed_description']);
        } else {
            //return empty if the attribute isnt set.
            return '';
        }
    }

    private function getTemplatedText($parsedText){
        $tags = Config::get('lorekeeper.template_tags');
        $templatedText = $parsedText;
        //loop over all tags to correctly replace them
        foreach($tags as $tag => $tagData){
            $pattern = '/#' . $tag . '([0-9]+)/'; // tag pattern is defined as #tag1 for example, in which 1 is the id of the template tag
            if (preg_match_all($pattern, $templatedText, $matches)) {
                //for each match replace and pass the template object if it exists

                foreach (array_unique($matches[1]) as $match) {
                    //find all matches first so we can query the tag data here instead of in each new template blade
                    //in template blade we can just always reference $tag then
                    $templateTag = TemplateTag::find($match);
                    if($templateTag != null)

                        $templatedText = preg_replace(
                            '/#' . $tag . '(' . $match . ')/',
                            Blade::render(
                                $templateTag->getTemplate(),
                                ["tag" => $templateTag, "data" => $templateTag->getTemplateData() ?? []]
                            ),
                            $templatedText
                        );
                }
            }
        }
        return $templatedText;
}
    protected static function boot() {
        parent::boot();

        $service = new LimitManager;
        $object = null;
        static::creating(function ($model) use ($service, $object) {
            switch (get_class($model)) {
                case Submission::class:
                    if ($model->status == 'Pending') {
                        return true;
                    }
                    $object = Prompt::find($model->prompt_id);
                    break;
            }

            if (!$object) {
                return true;
            }

            if (!$service->checkLimits($object)) {
                throw new \Exception($service->errors()->getMessages()['error'][0]);
            }
        });

        static::updating(function ($model) use ($service, $object) {
            switch (get_class($model)) {
                case Submission::class:
                    if ($model->status != 'Pending' || $model->staff_comments || $model->staff_id) {
                        return true;
                    }
                    $object = Prompt::find($model->prompt_id);
                    break;
            }

            if (!$object) {
                return true;
            }

            if (!$service->checkLimits($object)) {
                throw new \Exception($service->errors()->getMessages()['error'][0]);
            }
        });
    }
}
