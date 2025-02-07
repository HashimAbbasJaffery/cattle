@if ($paginator->hasPages())
    <section id="pagination">
        <div style="padding-left: 10px; text-align: center;" class="mobile-pagination mt-4 mb-3">
            @if ($paginator->onFirstPage())
                <a href="#" class="pagination inline-block arrows">&lt;</a>
            @else
                <a href="{{ $pagination->previousPageUrl() }}" class="pagination inline-block arrows">&lt;</a>
            @endif
            @foreach($elements as $element)
                @if(is_string($element))
                    <a href="#" class="pagination inline-block active">{{ $element }}</a>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="pagination inline-block active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="pagination inline-block active">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </section>
@endif
