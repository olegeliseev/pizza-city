<?php

namespace App\View\Components\Panels;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class CategoryMenu extends Component
{
    private ?Category $currentCategory;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $categorySlug = Route::current()->slug;
        $this->currentCategory = $categorySlug ? Category::where('slug', $categorySlug)->firstOrFail() : null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::get();
        return view('components.panels.category-menu', ['categories' => $categories]);
    }

    public function selectedCategory(?Category $category = null): bool
    {
        if (! Route::is('menu')) {
            return false;
        }

        if ($category === null || $this->currentCategory === null) {
            return $this->currentCategory === $category;
        }

        return $this->currentCategory->id === $category->id;
    }
}
