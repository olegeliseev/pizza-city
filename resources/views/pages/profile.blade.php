<x-layouts.app page-title="{{ auth()->user()->name }}">
    <section class="profile-section">
        <div class="container">
            <div class="profile-section__content">
                <h1 class="profile-section__title">Личный кабинет</h1>
                <x-panels.profile.orders :orders="$orders"/>
            </div>
        </div>
    </section>
</x-layouts.app>
