<form action="" method="GET">
    <div class="search-row">
        <div class="search-row__field">
            <span class="search-row__title">Найти:</span>
            <input class="search-row__input" name="search" value="{{ request()->get('search') }}" type="text">
        </div>
        <div class="search-row__buttons">
            <button class="search-row__btn search-row__search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
            <a class="search-row__btn search-row__delete-btn" href="{{ route('menu') }}">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>
        </div>
    </div>
</form>
