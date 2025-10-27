@if ($deactivated)
    <div style="filter:grayscale(1); opacity:0.75">
@endif

<div class="row pt-3 pb-3" style="border: 7px double #FFE9EF; border-radius: 10px;  background-image: url('{{ $user->profileImgUrl }}'); background-position: top middle; text-align: center; background-size: cover;">
    <div class="col-lg-12" style="text-shadow: 0 0 5px #40009f1b;">
            <div style="position: relative; margin: auto;">
                <img src="/images/avatars/{{ $user->avatar }}" style="width:125px; height:125px; border-radius:50%;" alt="{{ $user->name }}" />
            </div>
            <div style="background-color: rgba(255, 255, 255, 0.72); backdrop-filter: saturate(200%) blur(2px); padding: 5px; border-radius: 10px; box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.289); position: relative; margin: auto;">
                <h1> {!! $user->displayName !!}
                <a href="{{ url('reports/new?url=') . $user->url }}"><i class="fas fa-exclamation-triangle fa-xs" data-toggle="tooltip" title="Click here to report this user." style="opacity: 50%; font-size:0.5em;"></i></a>
                </h1>
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-1 text-center">
                        <i class="fas fa-users"></i> {!! $user->rank->displayName !!}{!! add_help($user->rank->parsed_description) !!}
                    </div>
                    <div class="col-md-2 text-center">
                        <i class="fas fa-link"></i>&nbsp;&nbsp;{!! $user->displayAlias !!}
                    </div>
                    <div class="col-md-2 text-center">
                        <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;{!! format_date($user->created_at, false) !!}
                    </div>
                    @if ($user->birthdayDisplay && isset($user->birthday))
                        <div class="col-md-2 text-center">
                            <i class="fas fa-birthday-cake"></i> {!! $user->birthdayDisplay !!}
                        </div>
                    @endif
                    @if ($user->settings->is_fto)
                        <span class="badge badge-success" data-toggle="tooltip" title="This user has not owned any characters from this world before.">FTO</span>
                    @endif
                </div>
            </div>
        
    </div>
</div>

<br/>

@if (isset($user->profile->parsed_text))
    <div class="card mb-3 text-center" style="clear:both;">
        <div class="card-body">
            {!! $user->profile->parsed_text !!}
        </div>
    </div>
@endif

<div class="card-deck mb-3 profile-assets" style="clear:both;">
    <div class="card profile-currencies profile-assets-card">
        <div class="card-body text-center">
            <h5 class="card-title">Bank</h5>
            <div class="profile-assets-content">
                @foreach ($user->getCurrencies(false, false, Auth::user() ?? null) as $currency)
                    <div>{!! $currency->display($currency->quantity) !!}</div>
                @endforeach
            </div>
            <div class="text-right"><a href="{{ $user->url . '/bank' }}">View all...</a></div>
        </div>
    </div>
    <div class="card profile-inventory profile-assets-card">
        <div class="card-body text-center">
            <h5 class="card-title">Inventory</h5>
            <div class="profile-assets-content">
                @if (count($items))
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-md-3 col-6 profile-inventory-item">
                                @if ($item->imageUrl)
                                    <img src="{{ $item->imageUrl }}" data-toggle="tooltip" title="{{ $item->name }}" alt="{{ $item->name }}" />
                                @else
                                    <p>{{ $item->name }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div>No items owned.</div>
                @endif
            </div>
            <div class="text-right"><a href="{{ $user->url . '/inventory' }}">View all...</a></div>
        </div>
    </div>
</div>

<h2>
    <a href="{{ $user->url . '/characters' }}">Characters</a>
    @if (isset($sublists) && $sublists->count() > 0)
        @foreach ($sublists as $sublist)
            / <a href="{{ $user->url . '/sublist/' . $sublist->key }}">{{ $sublist->name }}</a>
        @endforeach
    @endif
</h2>

@foreach ($characters->take(4)->get()->chunk(4) as $chunk)
    <div class="row mb-4 justify-content-center">
        @foreach ($chunk as $character)
            <div class="col-md-3 col-6 text-center">
                <div>
                    @if ((Auth::check() && Auth::user()->settings->content_warning_visibility == 0 && isset($character->character_warning)) || (isset($character->character_warning) && !Auth::check()))
                        <a href="{{ $character->url }}"><img src="{{ asset('images/content-warning.png') }}" class="img-thumbnail" alt="Content Warning - {{ $character->fullName }}" /></a>
                    @else
                        <a href="{{ $character->url }}"><img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail" alt="{{ $character->fullName }}" /></a>
                    @endif
                </div>
                <div class="mt-1">
                    <a href="{{ $character->url }}" class="h5 mb-0">
                        @if (!$character->is_visible)
                            <i class="fas fa-eye-slash"></i>
                        @endif {{ Illuminate\Support\Str::limit($character->fullName, 20, $end = '...') }}
                    </a>
                </div>
                @if ((Auth::check() && Auth::user()->settings->content_warning_visibility < 2 && isset($character->character_warning)) || (isset($character->character_warning) && !Auth::check()))
                    <div class="small">
                        <p><span class="text-danger"><strong>Character Warning:</strong></span> {!! nl2br(htmlentities($character->character_warning)) !!}</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endforeach

<div class="text-right"><a href="{{ $user->url . '/characters' }}">View all...</a></div>
<hr class="mb-5"/>

<div class="row">
    @if ($user->settings->allow_profile_comments)
        <div class="col-md-8">
            <div class="card mb-4"  style="border-top-right-radius: 1.8em; border-top-left-radius: 1.7em; box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.08);">
            <button class="collapsible text-center"><h5>Show Comments ▾</h5></button>
                <div class="content" style="border-bottom-right-radius: 0em; border-bottom-left-radius: 0em; padding-left: 30px;
  padding-right: 30px; background-color: #5114a200;">
                <hr>
                @comments(['model' => $user->profile, 'perPage' => 5])
                </div>
            <div class="card mb-4" style="border-top-right-radius: 0em; border-top-left-radius: 0em; box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0);">
            </div>
            </div>
    </div>
    @endif
    <div class="col-md-{{ $user->settings->allow_profile_comments ? 4 : 12 }}">
        <div class="card mb-4">
            <div class="card-header" data-toggle="collapse" data-target="#mentionHelp" aria-expanded="{{ $user->settings->allow_profile_comments ? 'true' : 'false' }}">
                <h5>Mention This User</h5>
            </div>
            <div class="card-body collapse {{ $user->settings->allow_profile_comments ? 'show' : '' }}" id="mentionHelp">
                In the rich text editor:
                <div class="alert alert-secondary">
                    {{ '@' . $user->name }}
                </div>
                @if (!config('lorekeeper.settings.wysiwyg_comments'))
                    In a comment:
                    <div class="alert alert-secondary">
                        [{{ $user->name }}]({{ $user->url }})
                    </div>
                @endif
                <hr>
                <div class="my-2"><strong>For Names and Avatars:</strong></div>
                In the rich text editor:
                <div class="alert alert-secondary">
                    {{ '%' . $user->name }}
                </div>
                @if (!config('lorekeeper.settings.wysiwyg_comments'))
                    In a comment:
                    <div class="alert alert-secondary">
                        [![{{ $user->name }}'s Avatar]({{ $user->avatarUrl }})]({{ $user->url }}) [{{ $user->name }}]({{ $user->url }})
                    </div>
                @endif
            </div>
            @if (Auth::check() && Auth::user()->isStaff)
                <div class="card-footer">
                    <h5>[ADMIN]</h5>
                    Permalinking to this user, in the rich text editor:
                    <div class="alert alert-secondary">
                        [user={{ $user->id }}]
                    </div>
                    Permalinking to this user's avatar, in the rich text editor:
                    <div class="alert alert-secondary">
                        [userav={{ $user->id }}]
                    </div>
                </div>
            @endif
        </div>
    </div>


@if ($deactivated)
</div>
@endif

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>