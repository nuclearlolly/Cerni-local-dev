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

    <table class="wsite-multicol-table" style="border-collapse:collapse;margin-left:auto;margin-right:auto;" border="0" cellspacing="10" cellpadding="0">
    <tbody class="wsite-multicol-tbody">
    <tr style="height:10px;">
    <td style="height:10px;width:190.8px;">
            <h5><a href="http://localhost/character/NPC-001"><img class="img-thumbnail" style="margin-left:auto;margin-right:auto;" src="http://localhost/images/characters/0/1_oQkJVhjdCW_th.png" alt="1_oQkJVhjdCW_th.png"></a></h5>
            </td>
        <td style="height:10px;width:8.9875px;">&nbsp;</td>
        <td style="width:650.412px;">
    <div class="paragraph">
        <div class="paragraph">
            <div class="card">
                <div class="card-body">
                    <p style="text-align:left;">"Come in come in! I am <a href="http://localhost/character/NPC-001">Aster</a>, and this marvelous place is called the Customization Shop! Very creative, I know. Here you can find all sorts of cosmetics to ensure you will always look fa-bu-lous!"</p>
                </div>
            </div>
        </div>
    </div>
    </td>
    </tr>
    </tbody>
</table>
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
                    @elseif(
                        $gallery->children_count &&
                            $gallery->through('children')->has('submissions')->where('is_visible', 1)->where('status', 'Accepted')->count())
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

@endsection
