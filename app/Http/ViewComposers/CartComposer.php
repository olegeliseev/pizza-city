<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CartService;

class CartComposer
{
    public function __construct(protected CartService $cartService)
    {
    }

    public function compose(View $view)
    {
        $cart = $this->cartService->getCart();
        $view->with('cart', $cart);
    }
}
