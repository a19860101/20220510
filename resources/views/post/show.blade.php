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
        </div>
    </div>
</div>
@endsection
