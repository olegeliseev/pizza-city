<section class="cart-section">
    <div class="container">
        <div class="cart-section__content">
            <h1 class="cart-section__title">Корзина</h1>
            @if (!empty(session()->get('cart')))
                <div class="cart-block">
                    <table class="cart-block__table">
                        <tbody>
                        @foreach (session()->get('cart') as $id => $item)
                            <x-panels.cart.cart_item :item="$item['item']" :quantity="$item['quantity']" :price="$item['price']"/>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="cart-block__total">
                        <span class="cart-block__total__text">Общая сумма заказа: </span>
                        <span class="cart-block__total__price"><x-panels.cart.cart_sum/></span>
                    </div>

                    <form action="{{ route('cart.createOrder') }}" method="POST">
                        @csrf
                        <button type="submit" class="cart-block__order-btn">Оформить заказ</button>
                    </form>
                </div>
            @else
                <span>Корзина пуста</span>
                <a href="{{ route('menu') }}" class="back-link">
                    <svg fill="#f96908" width="14px" height="14px" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                    </svg>
                    <span>К меню</span>
                </a>
            @endif
        </div>
    </div>
</section>
