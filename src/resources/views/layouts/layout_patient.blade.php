@extends('layouts.layout_basic')

@section('title', 'МедСистема (Пациент)')

@section('navbar')
    <div class="navbar-container">
        {{-- Логотип ведёт на домашнюю страницу пациента --}}
        <a href="{{ route('patient.dashboard') }}" class="navbar-logo">МедСистема</a>

        <ul class="navbar-menu">
            {{-- Моя страница -> тоже домашняя страница пациента --}}
            <li>
                <a href="{{ route('patient.dashboard') }}">Моя страница</a>
            </li>

            <li>
                <a href="{{ route('patient.profile') }}">Профиль</a>
            </li>

            {{-- Dropdown: Медицинские данные --}}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Медицинские данные</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('patient.glucose.index') }}">Измерения глюкозы</a></li>
{{--                    <li><a href="{{ route('patient.diet') }}">Диета</a></li>--}}
{{--                    <li><a href="{{ route('patient.activity') }}">Физическая активность</a></li>--}}
{{--                    <li><a href="{{ route('patient.medications') }}">Медикаменты</a></li>--}}
                    <li><a href="{{ route('patient.treatment_plan') }}">План лечения</a></li>
                </ul>
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

