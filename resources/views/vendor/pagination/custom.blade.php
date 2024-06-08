@if ($paginator->hasPages())
    <div class="join border border-gray-300">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button
                class="join-item btn btn-md btn-disabled disabled cursor-not-allowed !bg-cyan-200 !text-cyan-600 btn-ghost"
                disabled>&laquo;</button>
        @else
            <a class="join-item btn bg-cyan-300 hover:bg-cyan-400 text-cyan-700 btn-ghost"
                href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <button class="join-item btn btn-md btn-disabled disabled cursor-not-allowed"
                    disabled>{{ $element }}</button>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @php
                    $start = max(1, $paginator->currentPage() - 2);
                    $end = min($paginator->lastPage(), $paginator->currentPage() + 2);
                @endphp

                {{-- Show first and second page --}}
                @if ($start > 1)
                    <a class="join-item btn btn-md bg-cyan-400 hover:bg-cyan-500 btn-ghost"
                        href="{{ $paginator->url(1) }}">1</a>
                    @if ($start > 2)
                        <button class="join-item btn btn-md btn-disabled disabled cursor-not-allowed"
                            disabled>...</button>
                    @endif
                @endif

                {{-- Show current page and 2 pages before and after --}}
                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $paginator->currentPage())
                        <button
                            class="join-item btn btn-md bg-cyan-400 hover:bg-cyan-500 text-cyan-700 btn-ghost">{{ $page }}</button>
                    @else
                        <a class="join-item btn btn-md btn-active !bg-cyan-300 hover:!bg-cyan-400 text-cyan-700 btn-ghost"
                            href="{{ $paginator->url($page) }}">{{ $page }}</a>
                    @endif
                @endfor

                {{-- Show last page --}}
                @if ($end < $paginator->lastPage())
                    @if ($end < $paginator->lastPage() - 1)
                        <button
                            class="join-item btn btn-md btn-disabled disabled cursor-not-allowed !bg-cyan-200 text-cyan-700 btn-ghost"
                            disabled>...</button>
                    @endif
                    <a class="join-item btn btn-md btn-active !bg-cyan-300 hover:!bg-cyan-400 text-cyan-700 btn-ghost"
                        href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                @endif
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="join-item btn btn-md bg-cyan-300 hover:bg-cyan-400 text-cyan-700 btn-ghost"
                href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        @else
            <button class="join-item btn btn-md btn-disabled disabled cursor-not-allowed" disabled>&raquo;</button>
        @endif
    </div>
@endif
