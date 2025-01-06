{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Вход</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Вход в систему</h1>--}}

{{-- Отображение ошибок --}}
{{--@if ($errors->any())--}}
{{--    <div style="color:red;">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

{{-- Форма входа --}}
{{--<form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf--}}

{{--    <div>--}}
{{--        <label>Email:</label>--}}
{{--        <input type="email" name="email" value="{{ old('email') }}" required>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>Пароль:</label>--}}
{{--        <input type="password" name="password" required>--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label>--}}
{{--            <input type="checkbox" name="remember"> Запомнить меня--}}
{{--        </label>--}}
{{--    </div>--}}

{{--    <button type="submit">Войти</button>--}}
{{--</form>--}}

{{--<hr>--}}

{{-- Ссылка для восстановления пароля --}}
{{--<p>--}}
{{--    <a href="{{ route('password.request') }}">Забыли пароль?</a>--}}
{{--</p>--}}

{{-- Ссылки для регистрации --}}
{{--<p>Нет аккаунта?--}}
{{--    <a href="{{ route('doctor.register.form') }}">Регистрация Доктора</a> |--}}
{{--    <a href="{{ route('patient.register.form') }}">Регистрация Пациента</a>--}}
{{--</p>--}}
{{--</body>--}}
{{--</html>--}}


@extends('layouts.layout')

@section('title', 'Вход в систему')

@section('content')
    <div class="auth-form-container">
        <h2 class="auth-title">Вход в систему</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>
            <div class="form-group form-check">
                <label>
                    <input type="checkbox" name="remember" class="form-check-input"> Запомнить меня
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('password.request') }}">Забыли пароль?</a>
            <br>
            <a href="{{ route('doctor.register.form') }}">Регистрация (Доктор)</a> |
            <a href="{{ route('patient.register.form') }}">Регистрация (Пациент)</a>
        </p>
    </div>
@endsection


