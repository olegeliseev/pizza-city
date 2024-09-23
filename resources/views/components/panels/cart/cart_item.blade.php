@props(['item', 'quantity', 'price'])
<tr>
    <td>
        <div class="cart-block__img">
            <a href="{{ route('product', $item) }}">
                <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}">
            </a>
        </div>
    </td>
    <td>
        <a href="{{ route('product', $item) }}" class="cart-block__product-name">{{ $item->name }}</a>
    </td>
    <td>
        <form method="POST">
            @csrf
            <div class="cart-block__quantity">
                <button type="submit" formaction="{{ route('cart.minusOne', ['itemId' => $item->id]) }}"
                        class="cart-block__quantity-btn">
                    <svg class="w-4 h-4" aria-hidden="true" height="20px" width="20px"
                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <input type="number" class="cart-block__input" value="{{ $quantity }}">
                <button type="submit" formaction="{{ route('cart.plusOne', ['itemId' => $item->id]) }}"
                        class="cart-block__quantity-btn">
                    <svg class="w-4 h-4" aria-hidden="true" height="20px" width="20px"
                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </form>
    </td>
    <td>
        <x-panels.price :price="$price"/>
    </td>
    <td>
        <form action="{{ route('cart.deletePosition', ['item' => $item]) }}" method="POST">
            @csrf
            <button type="submit" class="cart-block__delete-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="18px" width="18px"
                     fill="currentColor" viewBox="0 0 448 512">
                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                </svg>
            </button>
        </form>
    </td>
</tr>
