@extends('template.master')
@section('main')
<h1>{{$product->title}}</h1>
<div>{{$product->desc}}</div>
<div>{{$product->price}}</div>
<a href="{{route('product.edit',[$product->id])}}">編輯資料</a>
@endsection
