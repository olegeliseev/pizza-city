@props(['product'])
<div class="product-page-img">
    <a href="{{ route('product', $product) }}">
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
    </a>
</div>
