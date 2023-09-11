@if ($paginator->hasPages())
<ul class="styled-pagination text-center ">
    @if ($paginator->onFirstPage())
    <li class="next"><a href="#"><span class="fa fa-angle-double-left"></span></a></li>
    @else
    <li class="next"><a href="{{ $paginator->previousPageUrl() }}"><span class="fa fa-angle-double-left"></span></a></li>
    @endif

    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li><a href="#">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a href="{{ $url }}" class="active">{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <li class="next"><a href="{{ $paginator->nextPageUrl() }}"><span class="fa fa-angle-double-right"></span></a></li>
    @else
    <li class="next"><a href="#"><span class="fa fa-angle-double-right"></span></a></li>
    @endif
</ul>
@endif
