{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Подтверждение Email</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Подтвердите ваш email</h1>--}}

{{--<p>--}}
{{--    Мы отправили письмо на ваш email. Пожалуйста, перейдите по ссылке в письме, чтобы подтвердить адрес.--}}
{{--</p>--}}

{{--@if (session('message'))--}}
{{--    <p style="color: green;">{{ session('message') }}</p>--}}
{{--@endif--}}

{{--<form method="POST" action="{{ route('verification.send') }}">--}}
{{--    @csrf--}}
{{--    <button type="submit">Отправить письмо снова</button>--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}




@extends('layouts.minimal')

@section('title', 'Подтверждение Email')

@section('content')
    <div class="auth-form-container">
        <h2>Подтвердите ваш email</h2>

        <p>
            Мы отправили письмо на ваш email. Пожалуйста, перейдите по ссылке в письме, чтобы подтвердить адрес.
        </p>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}" class="auth-form">
            @csrf
            <button type="submit" class="btn btn-primary">Отправить письмо снова</button>
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('login.form') }}">Вернуться к входу</a>
        </p>
    </div>
@endsection

