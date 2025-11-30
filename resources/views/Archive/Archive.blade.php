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
    </div>
<hr>
<div class="card mb-4">
    <div class="card-header">
        <h4>History Nonfiction</h4>
    </div>
    <div class="card-body image-info-box" style="min-height: 270px;">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row world-entry">
                    <div class="col-md-3 world-entry-image">
                        <a href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" data-lightbox="entry" data-title="Creation"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" class="world-entry-image"></a>
                    </div>
                    <div class="col-md-9">
                        <h3><a href="http://localhost/info/BestiaryIntroduction" class="display-item">Creation</a></h3>
                    <div>
                    <div class="row">
                        <div class="col-md">
                            <p><strong>Writer:</strong> <a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                        <div class="col-md">
                            <p><strong>Artist: </strong><a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                    </div>
                    <div class="world-entry-text parsed-text">
                        <p>The creation of Caerun, this book is considered a rare relic by many, the pages are a bit torn and have gained a stained look with the centuries, and sadly, some of its contents have been lost to time.</p>
                    </div>
                        <ul>
                            <li><a class="display-item" href="http://localhost/info/Creationpage1">Chapter 1: Greed and Pride</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <h4>Science Nonfiction</h4>
    </div>
    <div class="card-body image-info-box" style="min-height: 270px;">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row world-entry">
                    <div class="col-md-3 world-entry-image">
                        <a href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" data-lightbox="entry" data-title="Magic for beginners"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" class="world-entry-image"></a>
                    </div>
                    <div class="col-md-9">
                        <h3>
                        <a href="http://localhost/info/BestiaryIntroduction" class="display-item">Magic for beginners</a>
                        </h3>
                    <div>
                    <div class="row">
                        <div class="col-md">
                            <p><strong>Writer:</strong> <a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                        <div class="col-md">
                            <p><strong>Artist: </strong><a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                    </div>
                    <div class="world-entry-text parsed-text">
                        <p>An introduction to all kinds of magic, showing how wonderful but dangerous it can be if misused.</p>
                    </div>
                        <ul>
                            <li><a class="display-item" href="http://localhost/info/BestiaryIntroduction">Chapter 1: Introduction</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row world-entry">
                    <div class="col-md-3 world-entry-image">
                        <a href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" data-lightbox="entry" data-title="Bestiary"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" class="world-entry-image"></a>
                    </div>
                    <div class="col-md-9">
                        <h3>
                            <a href="http://localhost/info/BestiaryIntroduction" class="display-item">Bestiary</a>
                        </h3>
                    <div>
                    <div class="row">
                        <div class="col-md">
                            <p><strong>Writer:</strong> <a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                        <div class="col-md">
                            <p><strong>Artist: </strong><a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                    </div>
                    <div class="world-entry-text parsed-text">
                        <p>In this book, you can learn all about the unique creatures that coexist with us in this world.</p>
                    </div>
                        <ul>
                            <li><a class="display-item" href="http://localhost/info/BestiaryIntroduction">Chapter 1: Introduction</a></li>
                            <li><a class="display-item" href="http://localhost/info/BestiaryChapter2">Chapter 2: Moshcore</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <h4>Literary Traditions</h4>
    </div>
    <div class="card-body image-info-box" style="min-height: 270px;">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row world-entry">
                    <div class="col-md-3 world-entry-image">
                        <a href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" data-lightbox="entry" data-title="Our Culture"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dkrivcv-653a82ba-9ef4-420e-abf7-2b26714bd78a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiIvZi85YTdhZDA3Zi00YjAyLTRhOWYtYmFlYy02OTgxY2ViYzFlYmIvZGtyaXZjdi02NTNhODJiYS05ZWY0LTQyMGUtYWJmNy0yYjI2NzE0YmQ3OGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.qTppG5YezAaw5562MR87xBNMxXEd4d9Blfd5oDDGpPQ" class="world-entry-image"></a>
                    </div>
                    <div class="col-md-9">
                        <h3>
                            <a href="http://localhost/info/BestiaryIntroduction" class="display-item">Our Culture</a>
                        </h3>
                    <div>
                    <div class="row">
                        <div class="col-md">
                            <p><strong>Writer:</strong> <a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                        <div class="col-md">
                            <p><strong>Artist: </strong><a href="http://localhost/user/Nuclearlolly" class="display-user" style="color: #FFBD57;"><i class="fas fa-moon mr-1" style="opacity: 50%;"></i>Nuclearlolly</a></p>
                        </div>
                    </div>
                    <div class="world-entry-text parsed-text">
                        <p>Due to how much knowledge was lost after the raising of Postinen, a lot of things began to get documented, even to the most simple tradition.</p>
                    </div>
                        <ul>
                            <li><a class="display-item" href="http://localhost/info/BestiaryIntroduction">Chapter 1:</a></li>
                        </ul>
                    </div>
                </div>
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