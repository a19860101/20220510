
<nav>
    <a href="/">最前頁</a>
    @if($paginator->currentPage() !== 1)
    <a href="{{$paginator->previousPageUrl()}}">上一頁</a>
    @endif
    @for($i=0;$i<ceil($paginator->total() / 12);$i++)
    <a href="{{$paginator->url($i+1)}}">
        {{$i+1}}
    </a>
    @endfor
    @if($paginator->currentPage() !== $paginator->lastPage())
    <a href="{{$paginator->nextPageUrl()}}">下一頁</a>
    @endif
    <a href="/?page={{$paginator->lastPage()}}">最末頁</a>
</nav>
{{-- https://laravel.com/docs/8.x/pagination#paginating-query-builder-results --}}
