@extends('layouts.app')

@section('title')
    {{ $page->title }}
@endsection

@if ($page->has_image)
    @section('meta-img')
        {{ $page->imageUrl }}
    @endsection
@endif

@section('content')
    @if (Auth::check() && Auth::user()->isStaff)
        <div class="float-right">
            <a href="{{ url('admin/pages/edit/' . $page->id) }}" data-toggle="tooltip" data-title="Edit Page" data-original-title="" title="">
                <i class="fas fa-pen fa-crown"></i>
                <span class="sr-only">Edit Page</span>
            </a>
        </div>
    @endif
    @if ($page->page_category_id && $page->category->section)
        {!! breadcrumbs(['World' => 'world', $page->category->section->name => '/world/info/' . $page->category->section->key, $page->title => $page->url]) !!}
    @else
        {!! breadcrumbs([$page->title => $page->url]) !!}
    @endif

    <h1>{{ $page->title }}</h1>

    @if ($page->has_image)
        <div class="page-image">
            <img src="{{ $page->imageUrl }}" alt="{{ $page->name }}" class="w-100" />
        </div>
    @endif
    <div class="site-page-content parsed-text">
        {!! $page->parsed_text !!}
    </div>

    @if ($page->can_comment)
        <div class="container">
            @comments([
                'model' => $page,
                'perPage' => 5,
                'allow_dislikes' => $page->allow_dislikes,
            ])
        </div>
    @endif
@endsection
