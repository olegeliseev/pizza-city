@props(['product'])
<div class="product-page-img">
    <a href="{{ route('product', $product) }}">
        <img src="{{ $product->imageUrl }}" alt="{{ $product->name }}">
    </a>
</div>
