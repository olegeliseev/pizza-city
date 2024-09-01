@props(['product'])
<a href="{{ route('product', $product) }}" class="product-page-img">
    <img src="{{ $product->image }}" alt="{{ $product->name }}">
</a>
