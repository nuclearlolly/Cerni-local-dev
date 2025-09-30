<div class="card mb-0 text-center">
    <div class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-center">
        <h4 class="mb-0"><i class="fas fa-newspaper"></i> Recent News</h4>
    </div>

    <div class="card-body pt-0">
        @if ($newses->count())
            @foreach ($newses as $news)
                <div class="row justify-content-center">
                <div class="card-body text-center">
                        <h5 class="mb-0">
                            {!! $news->displayName !!}
                        </h5>
                        <span class="mb-0 small">
                            {!! $news->post_at ? pretty_date($news->post_at) : pretty_date($news->created_at) !!}
                    </span>
                    @if ($textPreview)
                        <p class="mb-0">
                            {!! substr(strip_tags(str_replace('<br />', '&nbsp;', $news->parsed_text)), 0, 200) !!}...
                            <a href="{!! $news->url !!}">Read more <i class="fas fa-arrow-right"></i></a>
                        </p>
                    @endif
                </div>
            @endforeach
        @else
            <div class="text-center pt-3">
                <h5 class="text-muted">There is no news.</h5>
            </div>
        @endif
    </div>
</div>
