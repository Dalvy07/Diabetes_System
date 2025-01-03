<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Медицинская система')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
{{-- Навигационная панель --}}
<nav class="navbar">
    <div class="navbar-container">
        <a href="{{ route('landing') }}" class="navbar-logo">МедСистема</a>
        <ul class="navbar-menu">
            <li><a href="{{ route('landing') }}">Главная</a></li>
            @auth
                @if (Auth::user()->doctor)
                    <li><a href="{{ route('doctor.home') }}">Моя страница</a></li>
                @elseif (Auth::user()->patient)
                    <li><a href="{{ route('patient.home') }}">Моя страница</a></li>
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="navbar-link logout-button">Выйти</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login.form') }}">Войти</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Регистрация</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('doctor.register.form') }}">Доктора</a></li>
                        <li><a href="{{ route('patient.register.form') }}">Пациента</a></li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</nav>

{{-- Основной контент --}}
<main class="main-content">
    @yield('content')
</main>

{{-- Футер --}}
<footer>
    <p>© 2025 Медицинская система. Все права защищены.</p>
</footer>

{{-- Подключение скриптов --}}
@stack('scripts')
</body>
</html>

