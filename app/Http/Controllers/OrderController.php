<?php

namespace App\Http\Controllers;

use App\Contracts\Services\OrderServiceContract;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderServiceContract $orderService
    ) {
    }

    public function create(): RedirectResponse
    {
       $this->orderService->createOrder();

       return redirect()->route('profile');
    }
}
