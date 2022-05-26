@extends('template.app')
@section('main')
<div class="container">
    <div class="row g-4">
        @foreach ($products as $pTag)
            <div class="col-3">
                <div class="border rounded-3">
                    @if(Str::of($pTag->cover)->substr(0,4) == 'http')
                    <img src="{{$pTag->cover}}"  class="w-100">
                    @else
                    <img src="{{ asset('storage/images/' . $pTag->cover) }}" class="w-100">
                    @endif
                    <div class="p-3">
                        <h3>{{ $pTag->title }}</h3>
                        @foreach($pTag->tags as $t)
                        <small class="badge bg-secondary">{{$t->title}}</small>
                        @endforeach
                        <div>
                            @if ($pTag->sale)
                                <del>{{ $pTag->price }}</del>
                                <b>{{ $pTag->sale }}</b>
                            @else
                                <b>{{ $pTag->price }}</b>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
