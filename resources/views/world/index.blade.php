@extends('world.layout')

@section('world-title')
    Home
@endsection

@section('content')
    {!! breadcrumbs(['Encyclopedia' => 'world']) !!}

    <h1>Encyclopedia</h1>
    <div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img class="img-fluid" src="{{ asset('images/account.png') }}" alt="Account"/>
                <h5 class="card-title" >Support us</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url('info/Anatomy') }}">Kofi</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img class="img-fluid" src="{{ asset('images/characters.png') }}" alt="Characters" />
                <h5 class="card-title">Species Guide</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url('info/Anatomy') }}">Anatomy</a></li>
                <li class="list-group-item"><a href="{{ url('world/species/1/traits') }}">Traits</a></li>
                <li class="list-group-item"><a href="{{ url('characters/transfers/incoming') }}">Explore</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img class="img-fluid" src="{{ asset('images/inventory.png') }}" alt="Inventory" />
                <h5 class="card-title">Activities</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url('prompts/prompts') }}">Prompts</a></li>
                <li class="list-group-item"><a href="{{ url('dailies') }}">Dailies</a></li>
                <li class="list-group-item"><a href="{{ url('inventory') }}">Achievements</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <img class="img-fluid" src="{{ asset('images/currency.png') }}" alt="Bank" />
                <h5 class="card-title">Masterlists</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url('users') }}">Users</a></li>
                <li class="list-group-item"><a href="{{ url('masterlist') }}">Cernis</a></li>
                <li class="list-group-item"><a href="{{ url('sublist/NPC') }}">NPCs</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
