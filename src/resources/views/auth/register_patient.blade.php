{{--@extends('layouts.layout')--}}

{{--@section('title', 'Регистрация Пациента')--}}

{{--@section('content')--}}
{{--    <div class="auth-form-container">--}}
{{--        <h2>Регистрация Пациента</h2>--}}

{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('patient.register') }}" class="auth-form">--}}
{{--            @csrf--}}

{{--            <h3 class="form-section-title">Основные данные</h3>--}}
{{--            <div class="form-group">--}}
{{--                <label for="name">Имя</label>--}}
{{--                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="email">Email</label>--}}
{{--                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="password">Пароль</label>--}}
{{--                <input type="password" name="password" id="password" class="form-input" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="password_confirmation">Подтверждение пароля</label>--}}
{{--                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>--}}
{{--            </div>--}}

{{--            <h3 class="form-section-title">Данные для Пациента</h3>--}}
{{--            <div class="form-group">--}}
{{--                <label for="birth_date">Дата рождения</label>--}}
{{--                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" class="form-input">--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="gender">Пол</label>--}}
{{--                <select name="gender" id="gender" class="form-input">--}}
{{--                    <option value="male" @if(old('gender') === 'male') selected @endif>Мужской</option>--}}
{{--                    <option value="female" @if(old('gender') === 'female') selected @endif>Женский</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>--}}
{{--        </form>--}}

{{--        <p class="auth-footer-links">--}}
{{--            Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('layouts.layout_basic')

@section('title', 'Регистрация Пациента')

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

@section('content')
    <div class="auth-form-container">
        <h2>Регистрация Пациента</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('patient.register') }}" class="auth-form">
            @csrf

            <h3 class="form-section-title">Основные данные</h3>
            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="pesel">PESEL</label>
                <input type="text" name="pesel" id="pesel" value="{{ old('pesel') }}" class="form-input" required maxlength="11" minlength="11">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Подтверждение пароля</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
            </div>

            <h3 class="form-section-title">Данные для Пациента</h3>
            <div class="form-group">
                <label for="birth_date">Дата рождения</label>
                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" class="form-input">
            </div>

            <div class="form-group">
                <label for="gender">Пол</label>
                <select name="gender" id="gender" class="form-input">
                    <option value="male" @if(old('gender') === 'male') selected @endif>Мужской</option>
                    <option value="female" @if(old('gender') === 'female') selected @endif>Женский</option>
                </select>
            </div>

            <!-- Новое поле: Дата постановки диагноза -->
            <div class="form-group">
                <label for="diagnosis_date">Дата постановки диагноза</label>
                <input type="date" name="diagnosis_date" id="diagnosis_date" value="{{ old('diagnosis_date') }}" class="form-input">
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>

        <p class="auth-footer-links">
            Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a>
        </p>
    </div>
@endsection
