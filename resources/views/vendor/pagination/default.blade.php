@if ($paginator->hasPages())

    <div class="row justify-content-center mb-1 mb-md-0">
        <div class="c-pagination">

            @if ($paginator->onFirstPage())
                <div class="col-auto">
                    <a href="javascript:;" class="u-hide--mobile">
                        <button class="prev-end disable"></button>
                    </a>
                </div>
            @else
                <div class="col-auto">
                    <a href="{{ $paginator->previousPageUrl() }}" class="u-hide--mobile">
                        <button class="prev-end"></button>
                    </a>
                </div>
            @endif

            @foreach ($elements as $element)
                <div class="col">
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <a href="javascript:;" class="u-hide--mobile" aria-disabled="true">
                            <button class="disable">{{ $element }}</button>
                        </a>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="javascript:;">
                                    <button class="active">{{ $page }}</button>
                                </a>
                            @else
                                <a href="{{ $url }}"><button>{{ $page }}</button></a>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div class="col-auto">
                    <a href="{{ $paginator->nextPageUrl() }}" class="u-hide--mobile">
                        <button class="next-end"></button>
                    </a>
                </div>
            @else
                <div class="col-auto">
                    <a href="javascript:;">
                        <button class="next-end disable"></button>
                    </a>
                </div>
            @endif

        </div>
    </div>
@endif
