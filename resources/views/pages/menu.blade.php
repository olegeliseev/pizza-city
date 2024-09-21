<x-layouts.app page-title="Меню">

    <x-slot:breadcrumbs>
        {{ Breadcrumbs::render() }}
    </x-slot:breadcrumbs>

    <x-panels.filter.filter :currentCategory="$currentCategory" :filter="$filter"/>

    <x-panels.menu.menu :products="$products"/>

    <x-panels.pagination :paginator="$products"/>
</x-layouts.app>
