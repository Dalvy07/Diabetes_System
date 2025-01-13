@extends('layouts.layout_basic')

@section('title', 'МедСистема (Доктор)')

@section('navbar')
    <div class="navbar-container">
        {{-- Логотип ведёт на домашнюю страницу доктора (а не на landing) --}}
        <a href="{{ route('doctor.dashboard') }}" class="navbar-logo">МедСистема</a>

        <ul class="navbar-menu">
            {{-- Моя страница -> домашняя страница доктора --}}
            <li>
                <a href="{{ route('doctor.dashboard') }}">Моя страница</a>
            </li>

            <li>
                <a href="{{ route('doctor.profile') }}">Профиль</a>
            </li>

            <li>
                <a href="{{ route('doctor.patients') }}">Пациенты</a>
            </li>

            {{-- Кнопка "Выход" (через форму) --}}
            <li>
{{--                КОСТЫЛЬ, ЧТОБЫ КНОПКА ВЫГЛЯДЕЛА НОРМАЛЬНО - ПОКАЗЫВАЕТСЯ ССЫЛКА, КОТОРАЯ ВЫЗЫВАЕТ ФОРМУ, А ДАЛЬШЕ ПОНЯТНО--}}
                <a href="#"
                   onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Выход
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
@endsection

{{-- Основной контент (по умолчанию пуст), переопределяется в дочерних вьюхах --}}
