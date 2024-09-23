@props(['orders'])
<div class="orders-block">
    <h3 class="orders-block__title">Список заказов</h3>
    @if ($orders->isNotEmpty())
        <div class="orders-block__content">
            <table class="orders-block__table">
                <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Товаров в заказе</th>
                    <th>Общая стоимость</th>
                    <th>Статус оплаты</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <x-panels.profile.orders_item :order="$order" :lineNumber="$loop->iteration"/>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <span>У вас нет заказов</span>
        <a href="{{ route('menu') }}" class="back-link">
            <svg fill="#f96908" width="14px" height="14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg>
            <span>К меню</span>
        </a>
    @endif
</div>
