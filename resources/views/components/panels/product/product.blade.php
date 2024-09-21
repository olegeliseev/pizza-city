@props(['product'])
<section class="product-page">
    <div class="container">
        <h2 class="product-page-title">{{ $product->name }}</h2>
        <x-panels.product.product_grid :product="$product" />
    </div>
</section>
