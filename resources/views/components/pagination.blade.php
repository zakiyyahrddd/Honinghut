@if ($paginator->hasPages())
<!--<div class="page-number">-->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center" role="navigation">
        @if (count($elements[0])>2)
        @if ($paginator->hasMorePages())
        @else
        <li class="item">
            <a class="link" href="{{ $paginator->url($paginator->currentPage()-2) }}" rel="next">{{$paginator->currentPage()-2}}</a>
        </li>
        @endif
        @endif

        @if ($paginator->onFirstPage())
        @else
        {{--
            <li class="item">
                <a class="link" href="{{ $paginator->url(1) }}" rel="prev"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i></a>
        </li>
        --}}
        <li class="item">
            <a class="link" href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ $paginator->currentPage()-1 }}</a>
        </li>
        @endif

        @foreach ($elements as $element)
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="item active" aria-current="page">
            <a class="link">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li class="item">
            <a class="link" href="{{ $paginator->nextPageUrl() }}" rel="next">{{$paginator->currentPage()+1}}</a>
        </li>
        {{--
            <li class="item">
                <a class="link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="prev"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
        </li>
        --}}
        @else
        @endif

        @if (count($elements[0])>2)
        @if ($paginator->onFirstPage())
        <li class="item">
            <a class="link" href="{{ $paginator->url($paginator->currentPage()+2) }}" rel="next">{{$paginator->currentPage()+2}}</a>
        </li>
        @endif
        @endif
    </ul>
</nav>
<!--</div>-->
@endif
