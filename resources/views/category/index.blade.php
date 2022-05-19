@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div>
                    <label for="" class="form-label">商品分類</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">商品英文分類</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
