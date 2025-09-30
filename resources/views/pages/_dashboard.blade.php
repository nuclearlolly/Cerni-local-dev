<h1>Welcome, {!! Auth::user()->displayName !!}!</h1>
<div class="card mb-4 timestamp">
    <div class="card-body">
        <i class="far fa-clock"></i> {!! format_date(Carbon\Carbon::now()) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        @include('widgets._carousel')
        </div>
    <div class="col-md-4 mb-4 align-items-center">
        <div class="card mb-0">
            @include('widgets._news', ['textPreview' => true])
            @include('widgets._sales')
            </div>
       </div>
    </div>
</div>
@include('widgets._recent_gallery_submissions', ['gallerySubmissions' => $gallerySubmissions])