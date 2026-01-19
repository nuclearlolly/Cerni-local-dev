<div style="position: absolute; bottom: 0; right: 0; margin-right: 2em; display: flex; align-items: center; gap: 1em; text-align: right;">
    @if (Auth::check())
        <div class="clock-styling bg-dark">
            @foreach (Auth::user()->getCurrencies(false) as $currency)
                <span class="ml-1" style="color: #decaffff;">{!! $currency->display($currency->quantity) !!}</span>
            @endforeach
        </div>
    @endif
</div>
