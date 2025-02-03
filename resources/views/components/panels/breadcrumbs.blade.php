@unless ($breadcrumbs->isEmpty())
    <section class="breadcrumbs">
        <div class="container">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <a href="{{ $breadcrumb->url }}" class="breadcrumbs__item">{{ $breadcrumb->title }}</a>
                    <svg class="breadcrumbs__item" xmlns="http://www.w3.org/2000/svg" height="14px" width="14px"
                         fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                    </svg>
                @else
                    <span href="#" class="breadcrumbs__item">{{ $breadcrumb->title }}</span>
                @endif
            @endforeach
        </div>
    </section>
@endunless

