@props(['products'])
<div class="menu-section__grid">
    @foreach($products as $product)
        <x-panels.menu.menu_product-card :product="$product" :cart="$cart"/>
    @endforeach
</div>
