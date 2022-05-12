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
            <a href="/post/{{$post->id}}">繼續閱讀</a>
            <a href="{{route('post.show',['post' => $post->id])}}">繼續閱讀</a>
            <hr>
        </div>
        @endforeach
    </div>
</div>
@endsection
