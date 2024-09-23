<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Repositories\ProductsRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function list(): Factory|View|Application
    {
        return view('pages.cart');
    }
    public function addItem(Request $request, ProductsRepositoryContract $productsRepository): RedirectResponse
    {
        $item = $productsRepository->getById($request->product);

        $cart = session()->get('cart', []);

        $quantity = $request->quantity ?: 1;

        if (isset($cart[$item->id])) {
            $cart[$item->id]['quantity'] += $quantity;
            if (isset($cart[$item->id]['quantity'])) {
                $cart[$item->id]['price'] = $item->price * $cart[$item->id]['quantity'];
            } else {
                $cart[$item->id]['price'] = $item->price * $quantity;
            }
        } else {
            $cart[$item->id] = [
                'item' => $item,
                'quantity' => $quantity,
                'price' => $item->price * $quantity,
            ];
        }

        session()->put('cart', $cart);

        return back();
    }

    public function plusOne(int $itemId, ProductsRepositoryContract $productsRepository): RedirectResponse
    {
        $item = $productsRepository->getById($itemId);

        $cart = session()->get('cart');

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += 1;
            $cart[$item->id]['price'] = $item->price * $cart[$item->id]['quantity'];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function minusOne(int $itemId, ProductsRepositoryContract $productsRepository): RedirectResponse
    {
        $item = $productsRepository->getById($itemId);

        $cart = session()->get('cart');

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] -= 1;
            $cart[$item->id]['price'] = $item->price * $cart[$item->id]['quantity'];
        }

        if ($cart[$itemId]['quantity'] <= 0) {
            unset($cart[$itemId]);
            session()->put('cart', $cart);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function deletePosition(Request $request, ProductsRepositoryContract $productsRepository): RedirectResponse
    {
        $item = $productsRepository->getById($request->item);

        if ($item) {
            $cart = session()->get('cart');
            if (isset($cart[$item->id])) {
                unset($cart[$item->id]);
                session()->put('cart', $cart);
            }
        }

         return redirect()->route('cart');
    }

    public function createOrder(OrdersRepositoryContract $ordersRepository): RedirectResponse
    {
        $statuses = ['Оплачен', 'Не оплачен', 'Ошибка оплаты'];

        $cart = session()->get('cart');
        $sum = 0;
        $quantity = 0;

        foreach ($cart as $id => $item) {
            $quantity += $item['quantity'];
            $sum += $item['price'];
        }

        $fields = [
            'quantity' => $quantity,
            'sum' => $sum,
            'status' => $statuses[array_rand($statuses)],
            'user_id' => auth()->user()->id,
        ];

        $ordersRepository->create($fields);

        session()->put('cart', []);

         return redirect()->route('profile');
    }
}
