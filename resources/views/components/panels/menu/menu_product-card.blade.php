<div class="product-card">
    @if($product->new)
        <div class="new-tag">Новинка</div>
    @elseif($product->hit)
        <div class="hit-tag">Хит</div>
    @endif
    <a href="{{ route('product', $product) }}"><img class="product-card__img"
                                                    src="@isset($product->image) {{ $product->image }} @else /assets/images/no_product.svg @endisset" alt="{{ $product->name }}"></a>
    <div class="product-card__content">
        <div class="product-card__body">
            <span class="product-card__title">{{ $product->name }}</span>
            <p class="product-card__description">{{ $product->ingredients }}</p>
        </div>
        <div class="product-card__info">
            <div class="product-card__price">{{ $product->price }}₽</div>
            <a class="product-card__btn" href="">В корзину</a>
        </div>
    </div>
</div>
