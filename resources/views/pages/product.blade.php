@props(['product'])
<x-layouts.app page-title="{{ $product->name }}">

    <x-slot:breadcrumbs>
        {{ Breadcrumbs::render('product', $product) }}
    </x-slot:breadcrumbs>

    <x-panels.product.product :product="$product"/>
</x-layouts.app>
