<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ $pageTitle ?? 'Главная страница' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="page">

    <x-layouts.parts.header/>

    <section class="content-section">
        {{ $breadcrumbs ?? '' }}
        {{ $slot }}
    </section>

    <x-layouts.parts.footer/>
</div>

</body>
</html>
