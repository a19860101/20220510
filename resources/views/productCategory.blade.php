@extends('template.app')
@section('main')
<div class="container">
    <div class="row g-4">
        @foreach ($productCategory as $p_category)
            <div class="col-3">
                <div class="border rounded-3">
                    @if(Str::of($p_category->cover)->substr(0,4) == 'http')
                    <img src="{{$p_category->cover}}"  class="w-100">
                    @else
                    <img src="{{ asset('storage/images/' . $p_category->cover) }}" class="w-100">
                    @endif
                    <div class="p-3">
                        <h3>{{ $p_category->title }}</h3>
                        <small class="badge bg-secondary text-decoration-none">{{$p_category->category->title}}</small>
                        <div>
                            @if ($p_category->sale)
                                <del>{{ $p_category->price }}</del>
                                <b>{{ $p_category->sale }}</b>
                            @else
                                <b>{{ $p_category->price }}</b>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
