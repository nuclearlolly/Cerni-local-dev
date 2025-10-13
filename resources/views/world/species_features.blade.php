@extends('world.layout')

@section('world-title')
    {{ $species->name }} Traits
@endsection

@section('content')
    {!! breadcrumbs(['World' => 'world', 'Species' => 'world/species', $species->name => $species->url, 'Traits' => 'world/species/' . $species->id . 'traits']) !!}
    <h1>{{ $species->name }} Traits</h1>

    <div class="card body text-center">
        <p> </p>
        <p>This is a visual index of all {!! $species->displayName !!}-specific traits. Click a trait to view more info on it!</p>
        <p>Traits can be combined in many ways, as long as they do not become a trait of a higher rarity.</p>
        <p><a class="display-rarity" style="color: #f56dafff;">Dominant Traits</a> are free and can be used as wished, <a class="display-rarity" style="color: #62cdf4ff;">Recessive Traits</a> however require a Trait Token, those can be found in the <a
                href="{{ url('shops/4') }}">User Shop.</a></p>
    </div>
    <hr>

    @include('world._features_index', ['features' => $features, 'showSubtype' => true])
@endsection

@section('scripts')
    @if (config('lorekeeper.extensions.visual_trait_index.trait_modals'))
        @include('world._features_index_modal_js')
    @endif
@endsection
