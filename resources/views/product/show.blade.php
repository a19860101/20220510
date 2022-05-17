@extends('template.master')
@section('main')
<h1>{{$product->title}}</h1>
<div>{{$product->desc}}</div>
<div>{{$product->price}}</div>
<a href="{{route('product.edit',[$product->id])}}">編輯資料</a>
<form action="{{route('product.destroy',[$product->id])}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="刪除" onclick="return confirm('確認刪除？')">
</form>
@endsection
