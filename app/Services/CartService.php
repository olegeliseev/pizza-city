<?php

namespace App\Services;

use App\Contracts\Services\CartServiceContract;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartService implements CartServiceContract
{
    public function getCart(): Cart|null
    {
        $user = Auth::user();

        if ($user) {
            return Cart::firstOrCreate(['user_id' => $user->id]);
        }

        return null;
    }

    public function updateQuantity(Request $request, Product $cartItem): int
    {
        if ($request->input('action') === 'increase') {
            return $cartItem->pivot->quantity + 1;
        } elseif ($request->input('action') === 'decrease') {
            return max(1, $cartItem->pivot->quantity - 1);
        } else {
            return max(1, (int) $request->input('quantity', 1));
        }
    }
}
