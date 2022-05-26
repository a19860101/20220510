<?php
    $nav_category = \App\Models\Category::get();
    $nav_tag = \App\Models\Tag::get();
?>
<nav class="navbar navbar-expand-lg bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">所有商品</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">分類</a>
                    <ul class="dropdown-menu">
                        @foreach($nav_category as $nCat)
                        <li><a href="{{route('productCategory',[$nCat->id])}}" class="dropdown-item">{{$nCat->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">標籤</a>
                    <ul class="dropdown-menu">
                        @foreach($nav_tag as $nTag)
                        <li><a href="{{route('productTag',[$nTag->id])}}" class="dropdown-item">{{$nTag->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
