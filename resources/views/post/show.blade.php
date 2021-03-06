@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>{{$post->title}}</h2>
            <div>
                {{$post->content}}
            </div>
            <div>
                {{$post->updated_at}}
            </div>

            <a href="/post/{{$post->id}}/edit" class="btn btn-success">編輯文章</a>
            <a href="{{route('post.edit',['post'=>$post->id])}}" class="btn btn-success">編輯文章</a>

            {{-- <form action="/post/{{$post->id}}" method="post"> --}}
            <form action="{{route('post.destroy',['post'=>$post->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="刪除" onclick="return confirm('確認刪除？')">
            </form>
        </div>
    </div>
</div>
@endsection
