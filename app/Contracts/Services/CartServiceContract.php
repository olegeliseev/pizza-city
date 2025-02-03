<?php

namespace App\Contracts\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

interface CartServiceContract
{
    public function getCart(): Cart|null;

    public function updateQuantity(Request $request, Product $cartItem): int;
}
