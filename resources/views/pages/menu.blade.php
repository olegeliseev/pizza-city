<x-layouts.app page-title="Меню">
    <x-panels.breadcrumbs/>

    <x-panels.filter.filter :currentCategory="$currentCategory"/>

    <x-panels.menu.menu :products="$products"/>

    <x-panels.pagination/>
</x-layouts.app>
