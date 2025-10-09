<ul class="text-center">
    <li class="sidebar-header"><a href="#" class="card-link">Star of the month!</a></li>

    <li class="sidebar-section p-2">
        @if(isset($featured) && $featured)
            <div>
                <a href="{{ $featured->url }}"><img src="{{ $featured->image->thumbnailUrl }}" class="img-thumbnail" /></a>
            </div>
            <div class="mt-1">
                <a href="{{ $featured->url }}" class="h5 mb-0">@if(!$featured->is_visible) <i class="fas fa-eye-slash"></i> @endif {{ $featured->fullName }}</a>
            </div>
            <div class="small">
             ・ {!! $featured->displayOwner !!}
            </div>
        @else
            <p>There is no featured character.</p>
        @endif
    </li>
</ul>

<ul class="text-center align-items-center">
    <li class="sidebar-header"><a href="#" class="card-link">Latest Gossip:</a></li>

    <li class="sidebar-section text-center align-items-center">
        <div class="card-body">
                <strong id="factDisplay"></strong>
        </div>
    </li>
</ul>

<script>
    (function newFact() {
  const facts = [
   '"Some say that the color of your horn can determine what sort of personality you have!"',
   '"Aster and Darius used to be very close, but no one knows why they no longer talk to each other."',
   '"Fawns are born with their hooves covered by a soft, rubbery protective layer called eponychium, or more commonly known as "fairy fingers"!"'
];
  const randomFact = Math.floor(Math.random() * facts.length);
  document.getElementById('factDisplay').innerHTML = facts[randomFact];
})();
</script>