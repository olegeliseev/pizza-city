<?php

namespace App\View\Components\Forms;

use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminProductForm extends Component
{
    public function __construct(
        public readonly Product $product,
        private readonly CategoriesRepositoryContract $categoriesRepository,
    ) {
    }

    public function render(): View|Closure|string
    {
        $categories = $this->categoriesRepository->findAll();

        return view('components.forms.admin_product-form', ['categories' => $categories]);
    }
}
