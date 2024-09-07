<?php

namespace App\View\Components\Forms;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminProductForm extends Component
{
    public function __construct(
        public readonly Product $product,
        private readonly Category $category,
    ) {
    }

    public function render(): View|Closure|string
    {
        $categories = Category::get();
        return view('components.forms.admin_product-form', ['categories' => $categories]);
    }
}
