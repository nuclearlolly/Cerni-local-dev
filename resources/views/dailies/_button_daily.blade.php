<div class="text-center">
    @if ($daily->has_image)
        <img src="{{ $daily->dailyImageUrl }}" style="max-width:100%" alt="{{ $daily->name }}" />
    @endif
    <p>{!! $daily->parsed_description !!}</p>
</div>

@if (Auth::user())
    @if ($daily->has_button_image)
        <div class="row justify-content-center mt-2">
            <form action="" method="post">
                @csrf
                <button class="btn" style="background-color:transparent;" name="daily_id" value="{{ $daily->id }}" @if ($isDisabled) disabled @endif>
                    <img src="{{ $daily->buttonImageUrl }}" class="w-100" style="max-width:200px;" />
                </button>
            </form>
        </div>
    @else
        <div class="row justify-content-center mt-2">
            <form action="" method="post">
                @csrf
                <button class="btn btn-primary" name="daily_id" value="{{ $daily->id }}" @if ($isDisabled) disabled @endif>Collect Daily Reward!</button>
            </form>
        </div>
    @endif
    <div class="text-center">
        <hr>
        <small>
            @if ($daily->daily_timeframe == 'lifetime')
                You will be able to collect rewards once.
            @else
                You will be able to collect rewards {!! $daily->daily_timeframe !!}.
            @endif
            @if (Auth::check() && isset($cooldown))
                You can collect rewards {!! pretty_date($cooldown) !!}!
            @endif
        </small>
    </div>
@else
    <div class="row mt-2 mb-2 justify-content-center">
        <div class="alert alert-danger" role="alert">
            You must be logged in to collect {{ __('dailies.dailies') }}!
        </div>
    </div>
@endif

@if ($daily->progress_display != 'none')
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="m-0 align-items-center">Progress ({{ $timer->step ?? 0 }}/{{ $daily->maxStep }}) {!! add_help($daily->is_streak ? 'Progress will reset if you miss collecting your reward in the given timeframe.' : 'Progress is safe even if you miss collecting your reward in the given timeframe.') !!}</h4>
        </div>

        <div class="card-body row m-auto w-100 text-center justify-content-center ">
            @foreach ($daily->rewards()->get()->groupBy('step') as $step => $rewards)
                @if ($step > 0)
                    <div class="card col-lg-2 col-12 w-100 m-2 {{ $step > ($timer->step ?? 0) ? 'daily' : '' }} text-center justify-content-center border p-0">

                        <div class="justify-content-center h-100">
                            <div class="col p-1">
                                <h4 class="">
                                    @if ($step > ($timer->step ?? 0))
                                        <i class="fa fa-lock"></i>
                                    @else
                                        <i class="fa fa-check"></i>
                                    @endif
                                </h4>
                                <h5 class=""> Day {{ $step }}</h5>
                            </div>
                        </div>

                        <div class="row w-100 p-0 m-auto text-center justify-content-center border">
                            @if ($daily->progress_display == 'all' || $step <= ($timer->step ?? 0))
                                @foreach ($rewards as $reward)
                                    <div class="p-2">
                                        @if ($reward->rewardImage)
                                            <div class="row text-center justify-content-center"><img src="{{ $reward->rewardImage }}" alt="{{ $reward->reward()->first()->name }}" style="max-width:100px;width:100%;" /></div>
                                        @endif
                                        <div class="row text-center justify-content-center">{{ $reward->quantity }} {{ $reward->reward()->first()->name }}</div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif
