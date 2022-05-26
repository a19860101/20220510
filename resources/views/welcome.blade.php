@extends('template.app')
@section('main')
<div class="container">
    <div class="row g-4">
        @foreach ($products as $prod)
            <div class="col-3">
                <div class="border rounded-3">
                    @if(Str::of($prod->cover)->substr(0,4) == 'http')
                    <img src="{{$prod->cover}}"  class="w-100">
                    @else
                    <img src="{{ asset('storage/images/' . $prod->cover) }}" class="w-100">
                    @endif
                    <div class="p-3">
                        <h3>{{ $prod->title }}</h3>
                        @foreach($prod->tags as $tag)
                            <a href="{{route('productTag',[$tag->id])}}" class="badge bg-secondary text-decoration-none">
                                {{$tag->title}}
                            </a>
                        @endforeach
                        <div>
                            @if ($prod->sale)
                                <del>{{ $prod->price }}</del>
                                <b>{{ $prod->sale }}</b>
                            @else
                                <b>{{ $prod->price }}</b>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            {{$products->links()}}
            {{$products->links('template.paginate')}}
        </div>
    </div>
</div>
@endsection
