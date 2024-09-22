@props(['status'])
<div class="order-status">
    <div @class([
        "order-status-circle order-status__success" => $status === "Оплачен",
        "order-status-circle order-status__pending" => $status === "Не оплачен",
        "order-status-circle order-status__error" => $status === "Ошибка оплаты",
])></div>
    <div class="order-status__text">{{ $status }}</div>
</div>
