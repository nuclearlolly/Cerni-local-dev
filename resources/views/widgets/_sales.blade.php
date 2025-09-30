<div class="card mb-0">
    <div class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-center">
        <h4 class="mb-0"><i class="fas fa-money-bill-wave"></i> Recent Sales</h4>
    </div>

    <div class="card-body pt-0">
        @if($saleses->count())
            @foreach($saleses as $sales)
                <div class="row justify-content-center">
                    @if($sales->characters->count())
                        <div class="card-body">
                            <a href="{{ $sales->url }}">
                                <img src="{{ $sales->characters->first()->character->image->thumbnailUrl }}" alt="{!! $sales->characters->first()->character->fullName !!}" class="img-thumbnail" height="200" width="200"/>
                            </a>
                        </div>
                    @endif
                
                    <div class="row {{ $sales->characters->count() ? 'col-md-9' : 'col-12' }} d-flex flex-column justify-content-center">
                        <span class="d-flex flex-column">
                                    <h4 class="mb-0">{!! $sales->displayName !!}</h4> 
                                    @if($sales->characters->count())
                        @else
                            <p class="pl-2 mb-0">{!! substr(strip_tags(str_replace("<br />", "&nbsp;", $sales->parsed_text)), 0, 300) !!}... <a href="{!! $sales->url !!}">View sale <i class="fas fa-arrow-right"></i></a></p>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center pt-3">
                <h5 class="mb-0">There are no sales.</h5>
            </div>
        @endif
    </div>
</div>
