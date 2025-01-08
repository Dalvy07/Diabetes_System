@extends('layouts.layout_basic')

@section('title', 'Главная — Медицинская система')

{{-- Навигационная панель --}}
@section('navbar')
    <div class="navbar-container">
        <a href="{{ route('landing') }}" class="navbar-logo">МедСистема</a>
        <ul class="navbar-menu">
            <li><a href="{{ route('landing') }}">Главная</a></li>
            <li><a href="{{ route('login.form') }}">Войти</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Регистрация</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('doctor.register.form') }}">Доктора</a></li>
                    <li><a href="{{ route('patient.register.form') }}">Пациента</a></li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

{{-- Основной контент страницы --}}
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
