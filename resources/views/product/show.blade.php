@extends('template.master')
@section('main')
<h1>{{$product->title}}</h1>
<div>{{$product->desc}}</div>
<div>{{$product->price}}</div>
@endsection
