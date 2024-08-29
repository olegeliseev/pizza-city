<x-layouts.app page-title="Создание позиции меню">
    <section class="admin-section">
        <div class="container">
            <div class="admin-section__content">
                <h1 class="admin-section__title">Создание позиции меню</h1>
                <form class="admin-section__form" action="{{ route('admin.products.store') }}" method="POST">
                    <x-forms.admin_product-form :product="$product"/>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
