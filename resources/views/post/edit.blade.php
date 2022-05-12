@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-6">
            {{-- <form action="/post/{{$post->id}}" method="post"> --}}
            <form action="{{route('post.update',['post'=>$post->id])}}" method="post">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="" class="form-label">標題</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">封面</label>
                    <input type="file" name="cover" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">內文</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
