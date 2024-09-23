@props(['product'])
<div class="buy-block">
    <span class="buy-block__grams">500 г</span>
    <span class="buy-block__price"><x-panels.price :price="$product->price"/></span>
    <form action="{{ route('cart.addItem', ['product' => $product]) }}" method="POST">
        @csrf
        <button class="buy-block__btn">
            <svg class="inline-block h-6 w-6 mr-2" height="20px" width="20px" fill="none"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span>В корзину</span>
        </button>
    </form>
</div>
