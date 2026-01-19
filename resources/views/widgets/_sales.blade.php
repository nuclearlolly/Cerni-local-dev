<div class="card mb-0 text-center">
    <div class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-center">
        <h4 class="mb-0"><i class="fas fa-money-bill-wave"></i> Recent Sales</h4>
    </div>

    <div class="card-body pt-0">
        @if($saleses->count())
            @foreach($saleses as $sales)
                <div class="row justify-content-center">
                    @if($sales->characters->count())
                        <div class="card-body text-center">
                            <a href="{{ $sales->url }}">
                                <img src="{{ $sales->characters->random()->character->image->thumbnailUrl }}" alt="{!! $sales->characters->random()->character->fullName !!}" class="img-thumbnail" height="200" width="200"/>
                            </a>
                        </div>
                    @endif
                
                    <div class="row {{ $sales->characters->count() ? 'col-md-9' : 'col-12' }} d-flex flex-column justify-content-center">
                        <span class="d-flex flex-column">
                            <h4 class="mb-0">{!! $sales->displayName !!}</h4> 
                            <a href="{!! $sales->url !!}">View Sale...</a>
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
