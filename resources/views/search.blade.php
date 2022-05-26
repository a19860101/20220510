@extends('template.master')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{route('searchResult')}}" method="get">
                @csrf
                <input type="text" name="q">
                <input type="submit" value="搜尋">
            </form>

        </div>
    </div>
</div>
@endsection
