@props(['products'])
<section class="menu-section">
    <div class="container">
        <h2 class="menu-section__title">Меню</h2>
        @if(!$products->isEmpty())
            <x-panels.menu.menu_grid :products="$products"/>
        @else
            <span class="menu-section__not-found">Ничего не найдено</span>
        @endif
    </div>
</section>
