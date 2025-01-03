{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Добро пожаловать</title>--}}
{{--</head>--}}
{{--<body>--}}

{{--<h1>Добро пожаловать в наше медицинское приложение</h1>--}}

{{--<p>--}}
{{--    Это система, в которой доктора и пациенты могут обмениваться данными,--}}
{{--    получать рекомендации, вести учёт и т. д.--}}
{{--</p>--}}

{{--<hr>--}}

{{--<h3>Действия</h3>--}}

{{--<ul>--}}
{{--    @auth--}}
{{--        --}}{{-- Если пользователь аутентифицирован --}}
{{--        <li>--}}
{{--            @if (Auth::user()->doctor)--}}
{{--                <a href="{{ route('doctor.home') }}">Перейти на домашнюю страницу доктора</a>--}}
{{--            @elseif (Auth::user()->patient)--}}
{{--                <a href="{{ route('patient.home') }}">Перейти на домашнюю страницу пациента</a>--}}
{{--            @else--}}
{{--                <a href="{{ route('home') }}">Перейти на домашнюю страницу</a>--}}
{{--            @endif--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <form method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}
{{--                <button type="submit" style="background: none; border: none; color: blue; cursor: pointer;">--}}
{{--                    Выйти из системы--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </li>--}}
{{--    @else--}}
{{--        --}}{{-- Если пользователь гость --}}
{{--        <li>--}}
{{--            <a href="{{ route('login.form') }}">Войти в систему</a>--}}
{{--            (если вы уже зарегистрированы)--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('doctor.register.form') }}">Регистрация (Доктор)</a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('patient.register.form') }}">Регистрация (Пациент)</a>--}}
{{--        </li>--}}
{{--    @endauth--}}
{{--</ul>--}}

{{--<hr>--}}

{{--<p style="color: gray; font-size: 0.9em;">--}}
{{--    © 2025 Название вашего приложения. Все права защищены.--}}
{{--</p>--}}

{{--</body>--}}
{{--</html>--}}

@extends('layouts.layout')

@section('title', 'Добро пожаловать')

@section('content')
    <div class="hero-section">
        <h1>Добро пожаловать в нашу медицинскую систему</h1>
        <p>Управляйте своим здоровьем и взаимодействуйте с медицинскими профессионалами легко и удобно!</p>
    </div>

    {{-- Карусель --}}
    <div class="carousel">
        <div class="carousel-track-container">
            <ul class="carousel-track">
                <li class="carousel-slide current-slide">
                    <img src="{{ asset('images/slide1.jpg') }}" alt="Слайд 1">
                </li>
                <li class="carousel-slide">
                    <img src="{{ asset('images/slide2.jpg') }}" alt="Слайд 2">
                </li>
                <li class="carousel-slide">
                    <img src="{{ asset('images/slide3.jpg') }}" alt="Слайд 3">
                </li>
            </ul>
        </div>
        <div class="carousel-nav">
            <button class="carousel-button prev">❮</button>
            <button class="carousel-button next">❯</button>
        </div>
    </div>


    {{-- Описание функционала --}}
    <div class="features-section">
        <h2>Почему стоит выбрать нас?</h2>
        <ul>
            <li>Удобная запись и управление медицинскими данными.</li>
            <li>Взаимодействие между врачами и пациентами.</li>
            <li>Доступ к рекомендациям по лечению.</li>
            <li>Простая регистрация для докторов и пациентов.</li>
        </ul>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/carousel.js') }}"></script>
@endpush
