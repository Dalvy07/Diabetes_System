<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Медицинская система')</title>
    {{-- Подключаем ваш основной файл со стилями --}}
    <link rel="stylesheet" href="{{ asset('css/appV2.css') }}">
    @stack('head-styles')
</head>
<body>

{{-- Шапка сайта (header) --}}
<header>
    {{-- Секция для навигационной панели --}}
    @section('navbar')
        <nav class="navbar-container">
            <div class="navbar-logo">
                {{-- Можно задать лого по умолчанию или вывести секцией --}}
                @yield('navbar-logo', 'Логотип')
            </div>
            <ul class="navbar-menu">
                {{-- Пример: @section('navbar-menu') <li><a href="#">Ссылка</a></li> ... @endsection --}}
                @yield('navbar-menu')
            </ul>
        </nav>
    @show
</header>

{{-- Основной контент сайта --}}
<main class="main-content">
    {{-- Секция для приветственного блока (Hero), если нужна --}}
    @section('hero')
        {{-- Пример: <section class="hero-section">... контент ...</section> --}}
    @show

    {{-- Секция для карусели (если нужна) --}}
    @section('carousel')
        {{-- Пример: <section class="carousel">... карусель ...</section> --}}
    @show

    {{-- Секция для функциональных блоков (Features), если нужна --}}
    @section('features')
        {{-- Пример: <section class="features-section">... функционал ...</section> --}}
    @show

    {{-- Основная часть контента (страницы, формы и т.д.) --}}
    @yield('content')
</main>

{{-- Футер сайта --}}
<footer>
    @yield('footer', '© 2025 Медицинская система. Все права защищены.')
</footer>

{{-- Скрипты --}}
@stack('scripts')
</body>
</html>


