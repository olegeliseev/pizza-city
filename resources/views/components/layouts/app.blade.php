<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }} - {{ $pageTitle ?? 'Главная страница' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="page">

    <x-layouts.parts.header/>

    {{ $breadcrumbs ?? '' }}

    <section class="content-section">
        {{ $slot }}
    </section>

    <x-layouts.parts.footer/>
</div>

</body>
</html>
