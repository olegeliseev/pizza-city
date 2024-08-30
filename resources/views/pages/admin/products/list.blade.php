<x-layouts.app page-title="Управление позициями меню">
    <section class="admin-section">
        <div class="container">
            <div class="admin-section__content">
                <h1 class="admin-section__title">Управление позициями меню</h1>
                <x-panels.messages.flashes />
                <a href="{{ route('admin.products.create') }}" class="admin-section__add-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Добавить позицию</span>
                </a>
                <x-panels.admin.admin_products-table :products="$products"/>
            </div>
        </div>
    </section>

    <x-panels.pagination/>
</x-layouts.app>
