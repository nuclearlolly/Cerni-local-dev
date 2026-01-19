@extends('galleries.layout')

@section('gallery-title')
    Home
@endsection

@section('gallery-content')
    {!! breadcrumbs(['Gallery' => 'gallery']) !!}
    <h1>
        @if (config('lorekeeper.extensions.show_all_recent_submissions.enable') && config('lorekeeper.extensions.show_all_recent_submissions.links.indexbutton'))
            <div class="float-right">
                <a class="btn btn-primary" href="gallery/all">
                    All Recent Submissions
                </a>
            </div>
        @endif
        Gallery
    </h1>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-3 text-center">
            <a href="http://localhost/character/NPC-003"><img class="img-thumbnail" src="http://localhost/images/characters/0/6_gwxeb25AKi_th.png" style="height: 190px; width: 190px;"></a>
            <hr>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p style="text-align: left;">"Ooo a visitor! Welcome to the <strong>Gallery</strong>, here you can find all of the wonderful work our community has done! I am <a href="http://localhost/character/NPC-003"><strong>Vivo</strong></a>, if
                        you need anything, just yell my name!"</p>
                    <p style="text-align: left;">"Oh, you don't know how to use the gallery? No biggie! Click on the guide below to learn how to upload your prompt work!"</p>
                    <div class="card mb-4" style="border-top-right-radius: 1.8em; border-top-left-radius: 1.7em; box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.08);">
                        <button class="collapsible text-center">
                            <h5>Gallery Guide ▾</h5>
                        </button>
                        <div class="content" style="border-bottom-right-radius: 0em; border-bottom-left-radius: 0em; padding-left: 30px; padding-right: 30px; background-color: #5114a200;">
                            <p>"Click on the <img
                                    src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkup49f-72640024-961b-44eb-b5ca-79b5dbcca5a5.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGt1cDQ5Zi03MjY0MDAyNC05NjFiLTQ0ZWItYjVjYS03OWI1ZGJjY2E1YTUucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.7COFXyIopeqH5vIWkECfr5_R5-UfaQbsUyPn2GrEbp0"
                                    alt="Plus" width="35" height="35" />to upload your prompt. After that, everything should be very straightforward! Upload the art or literature that you have done to complete a prompt, add a title,
                                description (if needed!), any content warning if needed, select a prompt, and then add all the characters that are present in the prompt! And done! After that, all you need to do is submit the prompt and link to the
                                gallery post you made! Easy peasy."</p>
                        </div>
                        <div class="card mb-4" style="border-top-right-radius: 0em; border-top-left-radius: 0em; box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    @if ($galleries->count())
        {!! $galleries->render() !!}

        @foreach ($galleries as $gallery)
            <div class="card mb-4">
                <div class="card-header">
                    <h4>
                        {!! $gallery->displayName !!}
                        @if (Auth::check() && $gallery->canSubmit($submissionsOpen, Auth::user()))
                            <a href="{{ url('gallery/submit/' . $gallery->id) }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
                        @endif
                    </h4>
                    @if ($gallery->children_count || (isset($gallery->start_at) || isset($gallery->end_at)))
                        <p>
                            @if (isset($gallery->start_at) || isset($gallery->end_at))
                                @if ($gallery->start_at)
                                    <strong>Open{{ $gallery->start_at->isFuture() ? 's' : 'ed' }}: </strong>{!! pretty_date($gallery->start_at) !!}
                                @endif
                                {{ $gallery->start_at && $gallery->end_at ? ' ・ ' : '' }}
                                @if ($gallery->end_at)
                                    <strong>Close{{ $gallery->end_at->isFuture() ? 's' : 'ed' }}: </strong>{!! pretty_date($gallery->end_at) !!}
                                @endif
                            @endif
                            {{ $gallery->children_count && (isset($gallery->start_at) || isset($gallery->end_at)) ? ' ・ ' : '' }}
                            @if ($gallery->children_count)
                                Sub-galleries:
                                @foreach ($gallery->children()->visible()->get() as $child)
                                    {!! $child->displayName !!}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            @endif
                        </p>
                    @endif
                </div>
                <div class="card-body">
                    @if ($gallery->submissions()->where('status', 'Accepted')->count())
                        <div class="row">
                            @foreach ($gallery->submissions()->where('is_visible', 1)->where('status', 'Accepted')->take(4)->get() as $submission)
                                <div class="col-md-3 text-center align-self-center">
                                    @include('galleries._thumb', ['submission' => $submission, 'gallery' => true])
                                </div>
                            @endforeach
                        </div>
                        @if ($gallery->submissions()->where('status', 'Accepted')->count() > 4)
                            <div class="text-right"><a href="{{ url('gallery/' . $gallery->id) }}">See More...</a></div>
                        @endif
                    @elseif($gallery->children_count && $gallery->through('children')->has('submissions')->where('is_visible', 1)->where('status', 'Accepted')->count())
                        <div class="row">
                            @foreach ($gallery->through('children')->has('submissions')->where('is_visible', 1)->where('status', 'Accepted')->orderBy('created_at', 'DESC')->get()->take(4) as $submission)
                                <div class="col-md-3 text-center align-self-center">
                                    @include('galleries._thumb', ['submission' => $submission, 'gallery' => false])
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>This gallery has no submissions!</p>
                    @endif
                </div>
            </div>
        @endforeach

        {!! $galleries->render() !!}
    @else
        <p>There aren't any galleries!</p>
    @endif
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
@endsection
