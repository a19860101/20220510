@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="{{route('product.update',[$product->id])}}" method="post">
                @csrf
                @method('patch')
                <div>
                    <label for="" class="form-label">商品名稱</label>
                    <input type="text" class="form-control" name="title" value="{{$product->title}}">
                </div>
                <div>
                    {{-- {{$category->id == $product->category_id ? 'selected': '';}} --}}
                    <label for="" class="form-label">商品分類</label>
                    <select name="category_id" id="" class="form-select">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            @if($category->id == $product->category_id)
                            {{'selected'}}
                            @endif
                            >
                            {{$category->title}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="" class="form-label">商品敘述</label>
                    <textarea name="desc" id="" cols="30" rows="10" class="form-control">{{$product->desc}}</textarea>
                </div>
                <div>
                    <label for="" class="form-label">價格</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>
                <div>
                    <label for="" class="form-label">特價</label>
                    <input type="text" class="form-control" name="sale" value="{{$product->sale}}">
                </div>
                <?php
                    $started_at = Carbon\Carbon::parse($product->started_at)->toDateString();
                    $ended_at = Carbon\Carbon::parse($product->ended_at)->toDateString();
                ?>
                <div>
                    <label for="" class="form-label">上架</label>
                    <input type="date" class="form-control" name="started_at" value="{{$started_at}}">
                </div>
                <div>
                    <label for="" class="form-label">下架</label>
                    <input type="date" class="form-control" name="ended_at" value="{{$ended_at}}">
                </div>
                <input type="submit" value="儲存商品" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
