@extends('template.master')
@section('main')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>所有商品</h2>
            <table class="table">
                <tr>
                    <th>商品名稱</th>
                    <th>商品分類</th>
                    <th>封面圖片</th>
                    <th>價格</th>
                    <th>特價</th>
                    <th>上架</th>
                    <th>下架</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->category->title}}</td>
                    <td>
                        <img src="{{asset('storage/images/'.$product->cover)}}" alt="" width="100">
                        <img src="/storage/images/{{$product->cover}}" alt="" width="100">
                        <form action="{{route('removeCover',[$product->id])}}" method="post">
                            @csrf
                            @method('patch')
                            {{-- <input type="hidden" name="cover" value="{{$product->cover}}"> --}}
                            {{-- <input type="hidden" name="id" value="{{$product->id}}"> --}}
                            <input type="submit" value="刪除">
                        </form>
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sale}}</td>
                    <td>{{$product->started_at}}</td>
                    <td>{{$product->ended_at}}</td>
                    <td>
                        <a href="{{route('product.show',['product' => $product->id])}}">詳細資料</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-12">
            <h2>已刪除</h2>
            <table class="table">
                <tr>
                    <th>商品名稱</th>
                    <th>封面圖片</th>
                    <th>價格</th>
                    <th>特價</th>
                    <th>上架</th>
                    <th>下架</th>
                </tr>
                @foreach ($trashes as $trash)
                <tr>
                    <td>{{$trash->title}}</td>
                    <td>
                        <img src="{{asset('storage/images/'.$trash->cover)}}" alt="" width="100">
                        <img src="/storage/images/{{$trash->cover}}" alt="" width="100">
                        <form action="{{route('removeCover',[$trash->id])}}" method="post">
                            @csrf
                            @method('patch')
                            {{-- <input type="hidden" name="cover" value="{{$trash->cover}}"> --}}
                            {{-- <input type="hidden" name="id" value="{{$trash->id}}"> --}}
                            <input type="submit" value="刪除">
                        </form>
                    </td>
                    <td>{{$trash->price}}</td>
                    <td>{{$trash->sale}}</td>
                    <td>{{$trash->started_at}}</td>
                    <td>{{$trash->ended_at}}</td>
                    <td>
                        <a href="{{route('restore',['id'=>$trash->id])}}">還原資料</a>
                        <form action="{{route('forceDelete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$trash->id}}">
                            <input type="submit" value="刪除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
