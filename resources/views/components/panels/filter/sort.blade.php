<form action="" method="GET">
    <div class="sort-row">
        <span class="sort-row__title">Сортировать:</span>
        <ul class="sort-list">
            <li>
                <x-panels.filter.sort-button name="sort_price" current-value="{{ request()->get('sort_price') }}">по цене</x-panels.filter.sort-button>
            </li>
            <li>
                <x-panels.filter.sort-button name="sort_name" current-value="{{ request()->get('sort_name') }}">по названию</x-panels.filter.sort-button>
            </li>
        </ul>
    </div>
</form>
