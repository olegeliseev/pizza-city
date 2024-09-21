<form action="" method="GET">
    <div class="sort-row">
        <span class="sort-row__title">Сортировать:</span>
        <ul class="sort-list">
            <li>
                <x-panels.filter.sort-button name="order_popularity" :current-value="$filter->getOrderPopularity()">по популярности</x-panels.filter.sort-button>
            </li>
            <li>
                <x-panels.filter.sort-button name="order_price" :current-value="$filter->getOrderPrice()">по цене</x-panels.filter.sort-button>
            </li>
            <li>
                <x-panels.filter.sort-button name="order_name" :current-value="$filter->getOrderName()">по названию</x-panels.filter.sort-button>
            </li>
        </ul>
    </div>
</form>
