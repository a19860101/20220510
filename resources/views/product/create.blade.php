@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="" class="form-label">商品名稱</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div>
                    <label for="" class="form-label">商品分類</label>
                    <select name="category_id" id="" class="form-select">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="" class="form-label">標籤</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div>
                    <label for="">商品封面</label>
                    <input type="file" name="cover" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">商品敘述</label>
                    <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <label for="" class="form-label">價格</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div>
                    <label for="" class="form-label">特價</label>
                    <input type="text" class="form-control" name="sale">
                </div>
                <div>
                    <label for="" class="form-label">上架</label>
                    <input type="date" class="form-control" name="started_at">
                </div>
                <div>
                    <label for="" class="form-label">下架</label>
                    <input type="date" class="form-control" name="ended_at">
                </div>
                <input type="submit" value="新增商品" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
