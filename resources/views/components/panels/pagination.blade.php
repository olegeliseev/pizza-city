@props(['paginator'])
<section class="pagination-section">
    <div class="container">
        <nav>
            @if($paginator->hasPages())
                {{ $paginator->onEachside(1)->links('vendor.pagination.custom') }}
            @endif
        </nav>
    </div>
</section>
