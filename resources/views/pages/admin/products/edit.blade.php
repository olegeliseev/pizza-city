<x-layouts.app page-title="Редактирование позиции меню">
    <section class="admin-section">
        <div class="container">
            <div class="admin-section__content">
                <h1 class="admin-section__title">Редактирование позиции меню</h1>
                <x-panels.messages.flashes />
                <form class="admin-section__form" action="{{ route('admin.products.update', ['product' => $product]) }}" method="POST">
                    @method('PATCH')
                    <x-forms.admin_product-form :product="$product"/>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
