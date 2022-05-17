@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <tr>
                    <th>商品名稱</th>
                    <th>商品敘述</th>
                    <th>價格</th>
                    <th>特價</th>
                    <th>上架</th>
                    <th>下架</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->desc}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sale}}</td>
                    <td>{{$product->started_at}}</td>
                    <td>{{$product->ended_at}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
