<div class="swiper-slide recommended-card">
    <a href="{{ route('product', $product) }}" class="recommended-card__img-container"><img
            class="recommended-card__img"
            src="{{ $product->imageUrl }}"
            alt="{{ $product->name }}"></a>
    <p class="recommended-card__title">{{ $product->name }}</p>
    <p class="recommended-card__price">
        <x-panels.price :price="$product->price"/>
    </p>
    <form action="{{ route('cart.addItem', ['product' => $product]) }}" method="POST">
        @csrf
        <button class="recommended-card__btn">Добавить</button>
    </form>
</div>
