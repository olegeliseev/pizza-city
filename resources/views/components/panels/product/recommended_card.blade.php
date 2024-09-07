<div class="swiper-slide recommended-card">
    <a href="{{ route('product', $product) }}" class="recommended-card__img-container"><img class="recommended-card__img"
                     src="{{ $product->image }}"
                     alt="{{ $product->name }}"></a>
    <p class="recommended-card__title">{{ $product->name }}</p>
    <p class="recommended-card__price"><x-panels.price :price="$product->price"/></p>
    <a href="#" class="recommended-card__btn">Добавить</a>
</div>
