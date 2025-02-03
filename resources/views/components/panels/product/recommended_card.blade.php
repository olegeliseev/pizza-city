<div class="swiper-slide recommended-card">
    <a href="{{ route('product', $product) }}" class="recommended-card__img-container"><img
            class="recommended-card__img"
            src="{{ $product->imageUrl }}"
            alt="{{ $product->name }}"></a>
    <p class="recommended-card__title">{{ $product->name }}</p>
    <p class="recommended-card__price">
        <x-panels.price :price="$product->price"/>
    </p>
        <form action="{{ route('cart.add', ['id' => $product->id]) }}" data-id="{{ $product->id }}" method="POST">
            @csrf
            @if(!$cart)
                <a href="{{ route('cart.index') }}" class="recommended-card__btn">Добавить</a>
            @else
                @if(!$cart->products()->wherePivot('product_id', $product->id)->exists())
                    <button class="recommended-card__btn">Добавить</button>
                @else
                    <a href="{{ route('cart.index') }}" class="recommended-card__btn recommended-card__btn-reverse">В корзине</a>
                @endif
            @endif
        </form>
</div>
