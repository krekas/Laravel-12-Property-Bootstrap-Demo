@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav class="d-flex justify-items-center justify-content-between mt-3">
            <div class="d-flex flex-fill d-sm-none">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <a class="page-item disabled" aria-disabled="true">
                            <span>@lang('pagination.previous')</span>
                        </a>
                    @else
                        <a class="page-item">
                            <div type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">@lang('pagination.previous')</div>
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a class="page-item">
                            <div type="button" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">@lang('pagination.next')</div>
                        </a>
                    @else
                        <a class="page-item disabled" aria-disabled="true">
                            <span aria-hidden="true">@lang('pagination.next')</span>
                        </a>
                    @endif
                </ul>
            </div>

            <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center">
                <div class="col-lg-3">
                    <p class="small text-muted">
                        Pagination (<span class="fw-semibold">{{ $paginator->currentPage() }}</span>
                        {!! __('of') !!}
                        <span class="fw-semibold">{{ $paginator->lastPage() }}</span>)
                    </p>
                </div>

                <div>
                    <ul class="custom-pagination">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span aria-hidden="true">&lsaquo;</span>
                            </a>
                        @else
                            <a class="page-item">
                                <div type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" aria-label="@lang('pagination.previous')">&lsaquo;</div>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <a class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></a>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <a class="page-item active" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" aria-current="page"><span>{{ $page }}</span></a>
                                    @else
                                        <a class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}"><div type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</div></a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a class="page-item">
                                <div type="button" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" aria-label="@lang('pagination.next')">&rsaquo;</div>
                            </a>
                        @else
                            <a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span aria-hidden="true">&rsaquo;</span>
                            </a>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif
</div>
