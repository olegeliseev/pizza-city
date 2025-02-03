<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Services\CartServiceContract;
use App\View\Components\Panels\Price;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        private readonly CartServiceContract $cartService,
        private readonly ProductsRepositoryContract $productsRepository
    ) {
    }

    public function index(): Factory|View|Application
    {
        $cart = $this->cartService->getCart();

        $products = $cart->products()->get();

        return view('pages.cart', ['cart' => $cart, 'products' => $products]);
    }

    public function add(int $productId): JsonResponse
    {
        $cart = $this->cartService->getCart();

        $cart->products()->syncWithoutDetaching([
            $productId => ['quantity' => 1]
        ]);

        $newCartCount = $cart->products()->get()->sum(function ($product) {
            return $product->pivot->quantity;
        });

        return response()->json([
            'addedToCart' => true,
            'newCartCount' => $newCartCount ? 'Корзина (' . $newCartCount . ')' : 'Корзина',
            'cartUrl' => route('cart.index')
        ]);
    }

    public function update(Request $request, int $productId): JsonResponse
    {
        $cart = $this->cartService->getCart();

        $cartItem = $cart->products()->where('product_id', $productId)->first();

        $newQuantity = $this->cartService->updateQuantity($request, $cartItem);

        $cart->products()->updateExistingPivot($productId, ['quantity' => $newQuantity]);

        $newPrice = $cartItem->price * $newQuantity;

        $newTotalPrice = $cart->products()->get()->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });

        $newCartCount = $cart->products()->get()->sum(function ($product) {
            return $product->pivot->quantity;
        });

        return response()->json([
            'itemId' => $productId,
            'newQuantity' => $newQuantity,
            'newPrice' => (new Price($newPrice))->formattedPrice(),
            'newCartCount' => $newCartCount ? 'Корзина (' . $newCartCount . ')' : 'Корзина',
            'newTotalPrice' => (new Price($newTotalPrice))->formattedPrice(),
        ]);
    }

    public function delete(int $productId): JsonResponse
    {
        $cart = $this->cartService->getCart();

        $cart->products()->detach($productId);

        $newTotalPrice = $cart->products()->get()->sum(function ($product) {
            return $product->pivot->quantity * $product->price;
        });

        $newCartCount = $cart->products()->get()->sum(function ($product) {
            return $product->pivot->quantity;
        });

        return response()->json([
            'newTotalPrice' => (new Price($newTotalPrice))->formattedPrice(),
            'newCartCount' => $newCartCount ? 'Корзина (' . $newCartCount . ')' : 'Корзина',
            'cartEmpty' => $cart->products()->count() === 0
        ]);
    }

    public function clear(): RedirectResponse
    {
        $cart = $this->cartService->getCart();

        $cart->products()->detach();

        return back();
    }
}
