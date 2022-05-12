@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="{{route('post.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">標題</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">封面</label>
                    <input type="file" name="cover" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">內文</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
