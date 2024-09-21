@props(['product'])
<x-layouts.app page-title="{{ $product->name }}">
    <x-panels.breadcrumbs/>

    <x-panels.product.product :product="$product"/>
</x-layouts.app>
