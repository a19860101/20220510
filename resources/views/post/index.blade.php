@extends('template.master')
@section('main')
<div class="container">
    <div class="row">

        @foreach($posts as $post)
        <div class="col-10">
            <h2>{{$post->title}}</h2>
            <div>
                {{$post->content}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
