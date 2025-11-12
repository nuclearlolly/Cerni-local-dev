<hr>
    {{-- Image Data --}}
    <div class="w-100">
        @if ((isset($image->content_warnings) && !Auth::check()) || (Auth::check() && Auth::user()->settings->content_warning_visibility < 2 && isset($image->content_warnings)))
            <div class="alert alert-danger text-center">
                <span class="float-right">
                    <a href="#" data-dismiss="alert" class="close">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </a>
                </span>
                <img src="{{ asset('images/content-warning.png') }}" class="mb-1" alt="Content Warning" style="height: 10vh;" />
                <h5>
                    <i class="fa fa-exclamation-triangle mr-2"></i>Character Warnings<i class="fa fa-exclamation-triangle ml-2"></i>
                </h5>
                <div>{!! implode(', ', $image->content_warnings) !!}</div>
            </div>
        @endif
    </div>
    {{-- Bio --}}
        @if ($character->profile->parsed_text)
            <div class="card mb-4"  style="border-top-right-radius: 1.8em; border-top-left-radius: 1.7em; box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.08);">
            <button class="collapsible text-center"><h5><i class="fas fa-star fa-shake-icon"></i> Profile ▾</h5></button>
                <div class="content" style="border-bottom-right-radius: 0em; border-bottom-left-radius: 0em; padding-left: 30px;
  padding-right: 30px; background-color: #5114a200;">
                <hr>
                {!! $character->profile->parsed_text !!}
                <a class="float-left" href="{{ url('reports/new?url=') . $character->url . '/profile' }}"><i class="fas fa-exclamation-triangle" data-toggle="tooltip" title="Click here to report this character's profile." style="opacity: 50%;"></i></a>
    @if (Auth::check() && ($character->user_id == Auth::user()->id || Auth::user()->hasPower('manage_characters')))
        <div class="text-right mb-2">
            <a href="{{ $character->url . '/profile/edit' }}" class="btn btn-outline-info btn-sm"><i class="fas fa-cog"></i> Edit Profile</a>
        </div>
    @endif
                </div>
            <div class="card mb-4" style="border-top-right-radius: 0em; border-top-left-radius: 0em; box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0);">
            </div>
            </div>
        @endif

    {{-- Info --}}
    <div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
    <div class="card character-bio">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="statsTab" data-toggle="tab" href="#stats" role="tab">Stats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="notesTab" data-toggle="tab" href="#notes" role="tab">Notes</a>
                </li>
            </ul>
        </div>
        <div class="card-body tab-content">
            <div class="tab-pane fade show active" id="stats">
                @include('character._tab_stats', ['character' => $character])
            </div>
            <div class="tab-pane fade" id="notes">
                {{-- Image notes --}}
                    @if ($image->parsed_description)
                        <div class="parsed-text imagenoteseditingparse">{!! $image->parsed_description !!}</div>
                    @else
                        <div class="imagenoteseditingparse">No additional notes given.</div>
                    @endif
                    @if (Auth::check() && Auth::user()->hasPower('manage_characters'))
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-info btn-sm edit-notes" data-id="{{ $image->id }}"><i class="fas fa-cog"></i> Edit</a>
                        </div>
                    @endif
            </div>
        </div> 
    </div>
    </div>
</div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card character-bio">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" id="infoTab" data-toggle="tab" href="#info" role="tab">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="creditTab" data-toggle="tab" href="#credit" role="tab">Credits</a>
                            </li>
                            @if (Auth::check() && Auth::user()->hasPower('manage_characters'))
                                <li class="nav-item">
                                    <a class="nav-link" id="settingsTab" data-toggle="tab" href="#settings-{{ $character->slug }}" role="tab"><i class="fas fa-cog"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="info">
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-5">
                                    <h5>Species</h5>
                                </div>
                                <div class="col-lg-3 col-5">{!! $image->species_id ? $image->species->displayName : 'None' !!}</div>
                            </div>
                            @if (count($image->subtypes))
                                <div class="row no-gutters">
                                    <div class="col-lg-3 col-5">
                                        <h5>Subtype{{ count($image->subtypes) > 1 ? 's' : '' }}</h5>
                                    </div>
                                    <div class="col-lg-3 col-5">
                                        {!! $image->displaySubtypes() !!}
                                    </div>
                                </div>
                            @endif
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-5">
                                    <h5>Rarity</h5>
                                </div>
                                <div class="col-lg-3 col-5">{!! $image->rarity_id ? $image->rarity->displayName : 'None' !!}</div>
                            </div>

                            <div class="mb-3 image-info-box" style="max-height: 204px;">
                                <div>
                                    <h5>Traits</h5>
                                </div>
                                @if (config('lorekeeper.extensions.traits_by_category'))
                                    <div>
                                        @php
                                            $traitgroup = $image->features()->get()->groupBy('feature_category_id');
                                        @endphp
                                        @if ($image->features()->count())
                                            @foreach ($traitgroup as $key => $group)
                                                <div class="mb-2">
                                                   @if ($key)
                                                        <strong>{!! $group->first()->feature->category->displayName !!}:</strong>
                                                    @else
                                                        <strong>Miscellaneous:</strong>
                                                    @endif
                                                    @foreach ($group as $feature)
                                                        <div class="ml-md-2">{!! $feature->feature->displayName !!} @if ($feature->data)
                                                                ({{ $feature->data }})
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @else
                                            <div>No traits listed.</div>
                                        @endif
                                    </div>
                                @else
                            <div>
                                <?php $features = $image->features()->with('feature.category')->get(); ?>
                                @if ($features->count())
                                    @foreach ($features as $feature)
                                        <div>
                                            @if ($feature->feature->feature_category_id)
                                                <strong>{!! $feature->feature->category->displayName !!}:</strong>
                                                @endif {!! $feature->feature->displayName !!} @if ($feature->data)
                                                    ({{ $feature->data }})
                                                @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div>No traits listed.</div>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="flex jc-center">
                        <div class="flex small jc-center gap-_5">
                            <p style="text-align: center;">
                                <strong> Uploaded: </strong> {!! pretty_date($image->created_at) !!} • <strong> Last Edited: </strong>{!! pretty_date($image->updated_at) !!}
                        </div>
                    </div>

                    @if (Auth::check() && Auth::user()->hasPower('manage_characters'))
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-info btn-sm edit-features" data-id="{{ $image->id }}"><i class="fas fa-cog"></i> Edit</a>
                        </div>
                    @endif
                </div>
            <div class="tab-pane fade" id="credit">
                    <div class="row no-gutters mb-2">
                        <div class="col-lg-4 col-4">
                            <h5>Design</h5>
                        </div>
                        <div class="col-lg-8 col-8">
                            @foreach ($image->designers as $designer)
                                <div>{!! $designer->displayLink() !!}</div>
                            @endforeach
                        </div>
                        <div class="col-lg-4 col-4">
                            <h5>Art</h5>
                        </div>
                        <div class="col-lg-4 col-4">
                            @foreach ($image->artists as $artist)
                                <div>{!! $artist->displayLink() !!}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3 image-info-box" style="max-height: 229px;">
                        <strong>Original Design:</strong>
                        <div class="row no-gutters justify-content-center">
                            @php $character->images()->whereHas('artists')->get()->sortBy('id')->first() @endphp
                            <a href="{{ $character->image->canViewFull(Auth::check() ? Auth::user() : null) && file_exists(public_path($character->image->imageDirectory . '/' . $character->image->fullsizeFileName)) ? $character->image->fullsizeUrl : $character->image->imageUrl }}"
                                class="image" alt="{{ $character->fullName }}" data-lightbox="entry" data-title="{{ $character->fullName }}">
                                <img src="{{ $character->image->canViewFull(Auth::check() ? Auth::user() : null) && file_exists(public_path($character->image->imageDirectory . '/' . $character->image->fullsizeFileName)) ? $character->image->fullsizeUrl : $character->image->imageUrl }}"
                                    class="image {{ $character->image->showContentWarnings(Auth::user() ?? null) ? 'content-warning' : '' }}" alt="{{ $character->fullName }}" style="max-height:200px" />
                            </a>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-4">
                                <strong>Art by:</strong>
                            </div>
                            <div class="col-lg-4 col-4">
                            @foreach ($image->artists as $artist)
                                <div>{!! $artist->displayLink() !!}</div>
                             @endforeach
                        </div>
                    </div>
                    </div>

                @if (Auth::check() && Auth::user()->hasPower('manage_characters'))
                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-info btn-sm edit-credits" data-id="{{ $image->id }}"><i class="fas fa-cog"></i> Edit</a>
                    </div>
                @endif

            </div>
            @if (Auth::check() && Auth::user()->hasPower('manage_characters'))
                <div class="tab-pane fade" id="settings-{{ $character->slug }}">
                    {!! Form::open(['url' => $character->is_myo_slot ? 'admin/myo/' . $character->id . '/settings' : 'admin/character/' . $character->slug . '/settings']) !!}
                    <div class="form-group">
                        {!! Form::checkbox('is_visible', 1, $character->is_visible, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
                        {!! Form::label('is_visible', 'Is Visible', ['class' => 'form-check-label ml-3']) !!} {!! add_help('Turn this off to hide the character. Only mods with the Manage Masterlist power (that\'s you!) can view it - the owner will also not be able to see the character\'s page.') !!}
                    </div>
                    <div class="text-right">
                        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                        {!! Form::open(['url' => 'admin/character/image/' . $image->id . '/settings']) !!}
                        <div class="form-group">
                            {!! Form::checkbox('is_visible', 1, $image->is_visible, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
                            {!! Form::label('is_visible', 'Is Viewable', ['class' => 'form-check-label ml-3']) !!} {!! add_help('If this is turned off, the image will not be visible by anyone without the Manage Masterlist power.') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::checkbox('is_valid', 1, $image->is_valid, ['class' => 'form-check-input', 'data-toggle' => 'toggle']) !!}
                            {!! Form::label('is_valid', 'Is Valid', ['class' => 'form-check-label ml-3']) !!} {!! add_help('If this is turned off, the image will still be visible, but displayed with a note that the image is not a valid reference.') !!}
                        </div>
                        @if (config('lorekeeper.settings.enable_character_content_warnings'))
                            <div class="form-group">
                                {!! Form::label('Content Warnings') !!} {!! add_help('These warnings will be displayed on the character\'s page. They are not required, but are recommended if the character contains sensitive content.') !!}
                                {!! Form::text('content_warnings', null, ['class' => 'form-control', 'id' => 'warningList', 'data-init-value' => $image->editWarnings]) !!}
                            </div>
                        @endif
                        <div class="text-right">
                            {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                        <div class="text-right">
                            @if ($character->character_image_id != $image->id)
                                <a href="#" class="btn btn-outline-info btn-sm active-image" data-id="{{ $image->id }}">Set Active</a>
                            @endif <a href="#" class="btn btn-outline-info btn-sm reupload-image" data-id="{{ $image->id }}">Reupload Image</a> <a href="#" class="btn btn-outline-danger btn-sm delete-image"
                                data-id="{{ $image->id }}">Delete</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
</div>
    {{-- Info --}}
        <div class="card mb-4">
    <div class="card character-bio">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="petsTab" data-toggle="tab" href="#pets" role="tab"><i class="fas fa-paw"></i> Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="awardsTab" data-toggle="tab" href="#awards" role="tab"><i class="fas fa-award"></i> Awards</a>
                </li>
            </ul>
        </div>
        <div class="card-body tab-content">
            <div class="tab-pane fade show active" id="pets">
                PETS INFO WILL GO HERE
            </div>
            <div class="tab-pane fade" id="awards">
                AWARDS INFO WILL GO HERE
            </div>
        </div> 
    </div>


@include('widgets._character_warning_js')

@section('scripts')
    @parent
    @include('character._image_js', ['character' => $character])
            <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
@endsection
