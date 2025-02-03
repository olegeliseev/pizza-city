@props(['product', 'cart'])
<div class="product-page__sidebar">
    <x-panels.product.product_buy :product="$product" :cart="$cart"/>

    <x-panels.product.product_description :product="$product" />

    <x-panels.product.product_nutritional-value :product="$product" />

    <x-panels.product.product_tags :tags="$product->tags"/>
</div>
