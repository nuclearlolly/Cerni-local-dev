@extends('character.layout', ['isMyo' => $character->is_myo_slot])

@section('profile-title')
    {{ $character->fullName }}
@endsection

@section('profile-content')
    @if ($character->is_myo_slot)
        {!! breadcrumbs(['MYO Slot Masterlist' => 'myos', $character->fullName => $character->url]) !!}
    @else
        {!! breadcrumbs([
            $character->category->masterlist_sub_id ? $character->category->sublist->name . ' Masterlist' : 'Character masterlist' => $character->category->masterlist_sub_id ? 'sublist/' . $character->category->sublist->key : 'masterlist',
            $character->fullName => $character->url,
        ]) !!}
    @endif

    <div class="row">
    <div class="col-md-3 text-center align-items-center">
        <img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail" style="height:170px"/>
        <hr>
        </div>
    <div class="col-md-9">
        @include('character._header', ['character' => $character])
    </div>
    </div>

    {{-- Main Image --}}
    <div class="mb-3">
            <div class="text-center">
                <a href="{{ $character->image->canViewFull(Auth::user() ?? null) && file_exists(public_path($character->image->imageDirectory . '/' . $character->image->fullsizeFileName)) ? $character->image->fullsizeUrl : $character->image->imageUrl }}"
                    data-lightbox="entry" data-title="{{ $character->fullName }}">
                    <img src="{{ $character->image->canViewFull(Auth::user() ?? null) && file_exists(public_path($character->image->imageDirectory . '/' . $character->image->fullsizeFileName)) ? $character->image->fullsizeUrl : $character->image->imageUrl }}"
                        class="image {{ $character->image->showContentWarnings(Auth::user() ?? null) ? 'content-warning' : '' }}" alt="{{ $character->fullName }}" style="max-height:480px"/>
                </a>
            @if ($character->image->canViewFull(Auth::user() ?? null) && file_exists(public_path($character->image->imageDirectory . '/' . $character->image->fullsizeFileName)))
                <div class="text-right">You are viewing the full-size image. <a href="{{ $character->image->imageUrl }}">View watermarked image</a>?</div>
            @endif
        </div>
        @include('character._image_info', ['image' => $character->image])
    </div>
@endsection

@section('scripts')
    @parent
    @include('character._image_js', ['character' => $character])
@endsection

