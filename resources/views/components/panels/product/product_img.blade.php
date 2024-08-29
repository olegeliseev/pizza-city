@props(['product'])
<a href="{{ route('product', $product) }}" class="product-page-img">
    <img src="@isset($product->image) {{ $product->image }} @else /assets/images/no_product.svg @endisset" alt="{{ $product->name }}">
</a>
