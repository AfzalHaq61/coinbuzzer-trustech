
@if ($paginator->hasPages())
    <div class="pages">
        <p class="has-text-centered">Page:</p>
        <nav class="pagination is-centered" role="navigation" aria-label="pagination">

            <ul class="pagination-list">

        @if ($paginator->onFirstPage())
        @else
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                            <li>
                                <a class="pagination-link is-current" aria-label="{{ $page }}"
                                   aria-current="page">{{ $page }}</a>
                            </li>
                    @else
                            <li>
                                <a href="{{ $url }}" class="pagination-link " aria-label="{{ $page }}"
                                   aria-current="page">{{ $page }}</a>
                            </li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
        @else
        @endif
            </ul>
        </nav>

    </div>
@endif
