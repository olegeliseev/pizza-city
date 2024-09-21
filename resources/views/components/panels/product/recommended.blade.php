<div class="recommended-section">
    <h3 class="recommended-section__title">Добавьте к заказу</h3>
    <div class="swiper swiper_product recommended-section__grid">
        <div class="swiper-wrapper">
            @foreach($recommendations as $recommendation)
                <x-panels.product.recommended_card :product="$recommendation"/>
            @endforeach
        </div>
    </div>
</div>
