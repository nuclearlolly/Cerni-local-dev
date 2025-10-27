<div class="row">
    <div class="col-md-2 text-center">
        <img src="/images/avatars/{{ Auth::user()->avatar }}" class="img-fluid rounded" style="max-height:120px max-height:120px" alt="{{ Auth::user()->name }}'s Avatar"/>
    </div>
    <div class="col-md-7">
        <h1>Welcome back</h1>
        <h1>{!! Auth::user()->displayName !!}!</h1>
    </div>
</div>

@include('widgets._dashboard_guide')

<div class="row">
    <div class="col-md-8">
        @include('widgets._carousel')
        </div>
    <div class="col-md-4 mb-4 align-items-center">
        @include('widgets._news', ['textPreview' => true])
        </div>
        <hr class="mb-1">
        @include('widgets._sales')
        </div>
</div>
@include('widgets._recent_gallery_submissions', ['gallerySubmissions' => $gallerySubmissions])