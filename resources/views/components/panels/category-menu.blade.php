<div class="burger-menu">
    <div class="bar">
        <span class="bar-1"> </span>
        <span class="bar-2"> </span>
        <span class="bar-3"> </span>
    </div>
</div>
<ul class="categories burger-menu__categories">
    <li class="category"><a href="{{ route('menu') }}"
                            class="@if ($selectedCategory(null)) active @endif category__link">Меню</a></li>
    @foreach($categories as $category)
        <li class="category"><a href="{{ route('menu', ['slug' => $category]) }}"
                                class="@if ($selectedCategory($category)) active @endif category__link">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>
<ul class="categories">
    <li class="category"><a href="{{ route('menu') }}"
                            class="@if ($selectedCategory(null)) active @endif category__link">Меню</a></li>
    @foreach($categories as $category)
        <li class="category"><a href="{{ route('menu', ['slug' => $category]) }}"
                                class="@if ($selectedCategory($category)) active @endif category__link">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>
