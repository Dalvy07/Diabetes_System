{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Регистрация Пациента</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Регистрация Пациента</h1>--}}

{{--@if ($errors->any())--}}
{{--    <div style="color:red;">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

{{--<!-- Форма регистрации пациента -->--}}
{{--<form method="POST" action="{{ route('patient.register') }}">--}}
{{--    @csrf--}}

{{--    <h3>Основные данные (User)</h3>--}}
{{--    <div>--}}
{{--        <label>Имя:</label>--}}
{{--        <input type="text" name="name" value="{{ old('name') }}" required>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Email:</label>--}}
{{--        <input type="email" name="email" value="{{ old('email') }}" required>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Пароль:</label>--}}
{{--        <input type="password" name="password" required>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Подтверждение пароля:</label>--}}
{{--        <input type="password" name="password_confirmation" required>--}}
{{--    </div>--}}

{{--    <hr>--}}
{{--    <h3>Данные для Пациента</h3>--}}
{{--    <div>--}}
{{--        <label>Дата рождения:</label>--}}
{{--        <input type="date" name="birth_date" value="{{ old('birth_date') }}">--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Пол:</label>--}}
{{--        <select name="gender">--}}
{{--            <option value="">Выбрать...</option>--}}
{{--            <option value="male"   @if(old('gender')==='male') selected @endif>Мужской</option>--}}
{{--            <option value="female" @if(old('gender')==='female') selected @endif>Женский</option>--}}
{{--        </select>--}}
{{--    </div>--}}

{{--    <button type="submit">Зарегистрироваться</button>--}}
{{--</form>--}}

{{--<hr>--}}
{{--<p>Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a></p>--}}
{{--</body>--}}
{{--</html>--}}



@extends('layouts.layout')

@section('title', 'Регистрация Пациента')

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
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>
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

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>

        <p class="auth-footer-links">
            Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a>
        </p>
    </div>
@endsection
