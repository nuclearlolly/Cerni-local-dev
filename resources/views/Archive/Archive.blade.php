@extends('layouts.app')

@section('title')
    Archives
@endsection

@section('sidebar')
    @include('browse._archivesidebar')
@endsection

@section('content')
 {!! breadcrumbs(['Archives' => 'Archives']) !!}
    <h1>Archives</h1>
    <div class="col-md-12">
        <div class="row justify-content-center">
    <div class="col-md-3 text-center">
        <a href="http://localhost/character/NPC-003"><img class="img-thumbnail" src="http://localhost/images/characters/0/1_oQkJVhjdCW_th.png" style="height: 190px; width: 190px;"></a>
    </div>
    <div class="col-md-8">
            <hr>
        <div class="card">
            <div class="card-body">
                <p style="text-align: left;">"Welcome to the Archives, I am<strong> Noel</strong>. All of your questions surrounding our world can be answered here- or well, the ones we know the answer to... If you need any help, don't hesitate to tell me, just be mindful of others."</p>
            </div>
        </div>
    </div>
</div>
<hr>
    <div class="card mb-2 text-center">
        <div class="card-header" style="border-radius: 1.5em !important;">
                <h1 class="col-12" style="text-align: center;">Science Nonfiction</h1>
                <div class="col-12" style="text-align: center;">Science nonfiction book genre consists of studies and findings in the scientific field, such as magic, biology, etc</div>
        </div>
    </div>

    <div class="card-body row m-auto w-100 justify-content-center">
        <div class="col-md-4 p-1">
            <div class="card character-bio">
                <div class="card-body tab-content">
                    <h3><a class="display-item" href="http://localhost/info/BestiaryIntroduction">Bestiary</h3>
                    <img class="btn img-fluid mb-2" href="http://localhost/info/BestiaryIntroduction" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ"></a>
                    <div class="world-entry-text"><em>In this book, you can learn all about the unique creatures that coexist with us in this world.</em></div>
                    <br />
                    <button class="collapsible text-center"><h4>Chapters ▾</h4></button>
                <div class="content" style="background-color: rgba(255, 255, 255, 0.23);">
                    <ul>
                        <li><a class="display-item" href="http://localhost/info/BestiaryIntroduction">Chapter 1: Introduction</a></li>
                        <li><a class="display-item" href="http://localhost/info/BestiaryChapter2">Chapter 2: Moshcore</a></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 p-1">
            <div class="card character-bio">
                <div class="card-body tab-content">
                    <h3><a class="display-item" href="https://www.corceis.com/world/library/book/13">Magic for beginners</h3>
                    <img class="btn img-fluid mb-2" href="http://localhost/info/Creationpage1" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ"></a>
                    <div class="world-entry-text"><em>An introduction to all kinds of magic, showing how wonderful but dangerous it can be if misused.</em></div>
                    <br />
            <button class="collapsible text-center"><h4>Chapters ▾</h4></button>
                <div class="content" style="background-color: rgba(255, 255, 255, 0.23);">
                    <ul>
                        <li><a class="display-item" href="https://www.corceis.com/world/library/volume/33">Chapter 1: </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-2 text-center">
        <div class="card-header" style="border-radius: 1.5em !important;">
                <h1 class="col-12" style="text-align: center;">Literary Traditions</h1>
                <div class="col-12" style="text-align: center;">Literary tradition refers to the body of written works, genres, styles, themes, and techniques that have been passed down through generations</div>
        </div>
    </div>

    <div class="card-body row m-auto w-100 justify-content-center">
        <div class="col-md-4 p-1">
            <div class="card character-bio">
                <div class="card-body tab-content">
                    <h3><a class="display-item" href="https://www.corceis.com/world/library/book/13">Our Culture</h3>
                    <img class="btn img-fluid mb-2" href="http://localhost/info/Creationpage1" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ"></a>
                    <div class="world-entry-text"><em>Due to how much knowledge was lost after the raising of Postinen, a lot of things began to get documented, even to the most simple tradition.</em></div>
                    <br />
                    <button class="collapsible text-center"><h4>Chapters ▾</h4></button>
                <div class="content" style="background-color: rgba(255, 255, 255, 0.23);">
                    <ul>
                        <li><a class="display-item" href="https://www.corceis.com/world/library/volume/33">Chapter 1: </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-2 text-center">
        <div class="card-header" style="border-radius: 1.5em !important;">
                <h1 class="col-12" style="text-align: center;">History Nonfiction</h1>
                <div class="col-12" style="text-align: center;">History nonfiction book genre consists of events of significant change that happened in the past and the discovery, collection, presentation, and organization of the information</div>
        </div>
    </div>

    <div class="card-body row m-auto w-100 justify-content-center">
        <div class="col-md-4 p-1">
            <div class="card character-bio">
                <div class="card-body tab-content">
                    <h3><a class="display-item" href="http://localhost/info/Creationpage1">Creation</h3>
                    <img class="btn img-fluid mb-2" href="http://localhost/info/Creationpage1" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ"></a>
                    <div class="world-entry-text"><em>The creation of Caerun, this book is considered a rare relic by many, the pages are a bit torn and have gained a stained look with the centuries, and sadly, some of its contents have been lost to time.</em></div>
                    <br />
                    <button class="collapsible text-center"><h4>Chapters ▾</h4></button>
                <div class="content" style="background-color: rgba(255, 255, 255, 0.23);">
                    <ul>
                        <li><a class="display-item" href="http://localhost/info/Creationpage1">Chapter 1: Greed and Pride</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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
@endsection