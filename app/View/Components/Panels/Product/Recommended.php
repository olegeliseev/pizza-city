<?php

namespace App\View\Components\Panels\Product;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Recommended extends Component
{
    public function __construct(public readonly Product $product)
    {
    }

    public function render(): View|Closure|string
    {
        $recommendations = $this->product->with('category')->whereHas('category', function ($query) {
            $query->where('name', '!=', 'Пиццы'); })->limit(4)->get();

        return view('components.panels.product.recommended', ['recommendations' => $recommendations]);
    }
}
