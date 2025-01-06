{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Регистрация Доктора</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Регистрация Доктора</h1>--}}

{{--@if ($errors->any())--}}
{{--    <div style="color:red;">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

{{--<!-- Форма регистрации доктора -->--}}
{{--<form method="POST" action="{{ route('doctor.register') }}">--}}
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
{{--    <h3>Данные для Доктора</h3>--}}
{{--    <div>--}}
{{--        <label>Специализации (через запятую):</label>--}}
{{--        <input type="text" name="specializations" value="{{ old('specializations') }}">--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Сертификаты (через запятую):</label>--}}
{{--        <input type="text" name="certifications" value="{{ old('certifications') }}">--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Часы работы:</label>--}}
{{--        <input type="text" name="work_hours" value="{{ old('work_hours') }}">--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Сейчас доступен?</label>--}}
{{--        <input type="checkbox" name="is_available" value="1"--}}
{{--               @if(old('is_available')) checked @endif>--}}
{{--    </div>--}}

{{--    <button type="submit">Зарегистрироваться</button>--}}
{{--</form>--}}

{{--<hr>--}}
{{--<p>Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a></p>--}}
{{--</body>--}}
{{--</html>--}}



@extends('layouts.layout')

@section('title', 'Регистрация Доктора')

@section('content')
    <div class="auth-form-container">
        <h2>Регистрация Доктора</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('doctor.register') }}" class="auth-form">
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

            <h3 class="form-section-title">Данные для Доктора</h3>
            <div class="form-group">
                <label for="specializations">Специализации (через запятую)</label>
                <input type="text" name="specializations" id="specializations" value="{{ old('specializations') }}" class="form-input">
            </div>

            <div class="form-group">
                <label for="certifications">Сертификаты (через запятую)</label>
                <input type="text" name="certifications" id="certifications" value="{{ old('certifications') }}" class="form-input">
            </div>

            <div class="form-group">
                <label for="work_hours">Часы работы</label>
                <input type="text" name="work_hours" id="work_hours" value="{{ old('work_hours') }}" class="form-input">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_available" value="1" @if(old('is_available')) checked @endif>
                    Сейчас доступен?
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>

        <p class="auth-footer-links">
            Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a>
        </p>
    </div>
@endsection
