<div class="product-card">
    @if($product->new)
        <div class="new-tag">Новинка</div>
    @elseif($product->hit)
        <div class="hit-tag">Хит</div>
    @endif
    <a href="{{ route('product', $product) }}"><img class="product-card__img"
                                                    src="{{ $product->imageUrl }}" alt="{{ $product->name }}"></a>
    <div class="product-card__content">
        <div class="product-card__body">
            <span class="product-card__title">{{ $product->name }}</span>
            <p class="product-card__description">{{ $product->description }}</p>
        </div>
        <div class="product-card__info">
            <div class="product-card__price"><x-panels.price :price="$product->price"/></div>
            <form action="{{ route('cart.addItem', ['product' => $product]) }}" method="POST">
                @csrf
                <button class="product-card__btn">В корзину</button>
            </form>
        </div>
    </div>
</div>
