{{--@extends('layouts.layout_basic')--}}

{{--@section('title', 'МедСистема (Доктор)')--}}

{{--@section('navbar')--}}
{{--    <div class="navbar-container">--}}
{{--        --}}{{-- Логотип ведёт на домашнюю страницу доктора (а не на landing) --}}
{{--        <a href="{{ route('doctor.dashboard') }}" class="navbar-logo">МедСистема</a>--}}

{{--        <ul class="navbar-menu">--}}
{{--            --}}{{-- Моя страница -> домашняя страница доктора --}}
{{--            <li>--}}
{{--                <a href="{{ route('doctor.dashboard') }}">Моя страница</a>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="{{ route('doctor.profile') }}">Профиль</a>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="{{ route('doctor.patients') }}">Пациенты</a>--}}
{{--            </li>--}}

{{--            --}}{{-- Кнопка "Выход" (через форму) --}}
{{--            <li>--}}
{{--                КОСТЫЛЬ, ЧТОБЫ КНОПКА ВЫГЛЯДЕЛА НОРМАЛЬНО - ПОКАЗЫВАЕТСЯ ССЫЛКА, КОТОРАЯ ВЫЗЫВАЕТ ФОРМУ, А ДАЛЬШЕ ПОНЯТНО--}}
{{--                <a href="#"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                document.getElementById('logout-form').submit();">--}}
{{--                    Выход--}}
{{--                </a>--}}
{{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endsection--}}

{{-- Основной контент (по умолчанию пуст), переопределяется в дочерних вьюхах --}}


@extends('layouts.layout_basic')

@section('title', 'MedSystem (Doctor)')

@section('navbar')
    <div class="navbar-container">
        {{-- The logo leads to the doctor's home page (not the landing page) --}}
        <a href="{{ route('doctor.dashboard') }}" class="navbar-logo">MedSystem</a>

        <ul class="navbar-menu">
            {{-- My Page -> Doctor's home page --}}
            <li>
                <a href="{{ route('doctor.dashboard') }}">My Page</a>
            </li>

            <li>
                <a href="{{ route('doctor.profile') }}">Profile</a>
            </li>

            <li>
                <a href="{{ route('doctor.patients') }}">Patients</a>
            </li>

            {{-- "Logout" button (via form) --}}
            <li>
                {{--                WORKAROUND TO MAKE THE BUTTON LOOK NORMAL - A LINK IS DISPLAYED THAT TRIGGERS A FORM, THEN IT'S CLEAR --}}
                <a href="#"
                   onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
@endsection

{{-- Main content (empty by default), overridden in child views --}}
