<x-layouts.app page-title="Главная страница">
    <x-panels.banners.banners/>

    @if ($hitProducts->isNotEmpty())
        <x-panels.menu.homepage.popular-section :products="$hitProducts"/>
    @endif

    @if ($newProducts->isNotEmpty())
        <x-panels.menu.homepage.new-section :products="$newProducts"/>
    @endif
</x-layouts.app>
