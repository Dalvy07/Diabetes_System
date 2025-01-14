{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>@yield('title', 'Медицинская система')</title>--}}
{{--    --}}{{-- Подключаем ваш основной файл со стилями --}}
{{--    <link rel="stylesheet" href="{{ asset('css/appV2.css') }}">--}}
{{--    @stack('head-styles')--}}
{{--</head>--}}
{{--<body>--}}

{{-- Шапка сайта (header) --}}
{{--<header>--}}
{{--    --}}{{-- Секция для навигационной панели --}}
{{--    @section('navbar')--}}
{{--        <nav class="navbar-container">--}}
{{--            <div class="navbar-logo">--}}
{{--                --}}{{-- Можно задать лого по умолчанию или вывести секцией --}}
{{--                @yield('navbar-logo', 'Логотип')--}}
{{--            </div>--}}
{{--            <ul class="navbar-menu">--}}
{{--                --}}{{-- Пример: @section('navbar-menu') <li><a href="#">Ссылка</a></li> ... @endsection --}}
{{--                @yield('navbar-menu')--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--    @show--}}
{{--</header>--}}

{{-- Основной контент сайта --}}
{{--<main class="main-content">--}}
{{--    --}}{{-- Секция для приветственного блока (Hero), если нужна --}}
{{--    @yield('hero')--}}
{{--        --}}{{-- Пример: <section class="hero-section">... контент ...</section> --}}

{{--    --}}{{-- Секция для карусели (если нужна) --}}
{{--    @yield('carousel')--}}
{{--        --}}{{-- Пример: <section class="carousel">... карусель ...</section> --}}

{{--    --}}{{-- Секция для функциональных блоков (Features), если нужна --}}
{{--    @yield('features')--}}
{{--        --}}{{-- Пример: <section class="features-section">... функционал ...</section> --}}

{{--    --}}{{-- Основная часть контента (страницы, формы и т.д.) --}}
{{--    @yield('content')--}}
{{--</main>--}}

{{-- Футер сайта --}}
{{--<footer>--}}
{{--    @yield('footer', '© 2025 Медицинская система. Все права защищены.')--}}
{{--</footer>--}}

{{-- Скрипты --}}
{{--@stack('scripts')--}}
{{--</body>--}}
{{--</html>--}}


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Medical System')</title>
    {{-- Connecting your main stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/appV2.css') }}">
    @stack('head-styles')
</head>
<body>

{{-- Website header --}}
<header>
    {{-- Section for navigation bar --}}
    @section('navbar')
        <nav class="navbar-container">
            <div class="navbar-logo">
                {{-- You can set a default logo or override it with a section --}}
                @yield('navbar-logo', 'Logo')
            </div>
            <ul class="navbar-menu">
                {{-- Example: @section('navbar-menu') <li><a href="#">Link</a></li> ... @endsection --}}
                @yield('navbar-menu')
            </ul>
        </nav>
    @show
</header>

{{-- Main website content --}}
<main class="main-content">
    {{-- Section for the hero block, if needed --}}
    @yield('hero')
    {{-- Example: <section class="hero-section">... content ...</section> --}}

    {{-- Section for carousel (if needed) --}}
    @yield('carousel')
    {{-- Example: <section class="carousel">... carousel ...</section> --}}

    {{-- Section for feature blocks, if needed --}}
    @yield('features')
    {{-- Example: <section class="features-section">... features ...</section> --}}

    {{-- Main content (pages, forms, etc.) --}}
    @yield('content')
</main>

{{-- Website footer --}}
<footer>
    @yield('footer', '© 2025 Medical System. All rights reserved.')
</footer>

{{-- Scripts --}}
@stack('scripts')
</body>
</html>


