<h1>Welcome, {!! Auth::user()->displayName !!}!</h1>
<div class="card mb-4 timestamp">
    <div class="card-body">
        <i class="far fa-clock"></i> {!! format_date(Carbon\Carbon::now()) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('widgets._carousel') 
    </div>
</div>

@include('widgets._news', ['textPreview' => true])
@include('widgets._sales')

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('images/account.png') }}" alt="Account" />
                <h5 class="card-title">Support us</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ Auth::user()->url }}">Kofi</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('images/characters.png') }}" alt="Characters" />
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
                <img src="{{ asset('images/inventory.png') }}" alt="Inventory" />
                <h5 class="card-title">Activities</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url('prompts/prompts') }}">Prompts</a></li>
                <li class="list-group-item"><a href="{{ url('dailies') }}">Dailies</a></li>
                <li class="list-group-item"><a href="{{ url('inventory') }}">Awards</a></li>
                <li class="list-group-item"><a href="{{ url('inventory') }}">Collections</a></li>
                <li class="list-group-item"><a href="{{ url('inventory') }}">Crafting</a></li>
                <li class="list-group-item"><a href="{{ url('inventory') }}">Foraging</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset('images/currency.png') }}" alt="Bank" />
                <h5 class="card-title">Masterlists</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ url('users') }}">Users</a></li>
                <li class="list-group-item"><a href="{{ url('masterlist') }}">Cernis</a></li>
                <li class="list-group-item"><a href="{{ url('sublist/NPC') }}">NPCs</a></li>
                <li class="list-group-item"><a href="{{ url('inventory') }}">Breeding</a></li>
            </ul>
        </div>
    </div>
</div>

@include('widgets._recent_gallery_submissions', ['gallerySubmissions' => $gallerySubmissions])
