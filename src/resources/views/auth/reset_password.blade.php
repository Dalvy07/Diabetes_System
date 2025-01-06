{{--<h1>Сброс пароля</h1>--}}

{{--<form action="{{ route('password.update') }}" method="POST">--}}
{{--    @csrf--}}
{{--    <input type="hidden" name="token" value="{{ $token }}">--}}
{{--    <input type="hidden" name="email" value="{{ $email }}">--}}
{{--    <label>Новый пароль:</label>--}}
{{--    <input type="password" name="password" required>--}}
{{--    @error('password')--}}
{{--    <p style="color: red;">{{ $message }}</p>--}}
{{--    @enderror--}}

{{--    <label>Подтверждение пароля:</label>--}}
{{--    <input type="password" name="password_confirmation" required>--}}

{{--    <button type="submit">Сбросить пароль</button>--}}
{{--</form>--}}




@extends('layouts.minimal')

@section('title', 'Сброс пароля')

@section('content')
    <div class="auth-form-container">
        <h2>Сброс пароля</h2>

        <form action="{{ route('password.update') }}" method="POST" class="auth-form">
            @csrf

            {{-- Токен сброса --}}
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            {{-- Новый пароль --}}
            <div class="form-group">
                <label for="password">Новый пароль</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror

            {{-- Подтверждение пароля --}}
            <div class="form-group">
                <label for="password_confirmation">Подтверждение пароля</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
            </div>

            <button type="submit" class="btn btn-primary">Сбросить пароль</button>
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('login.form') }}">Вернуться к входу</a>
        </p>
    </div>
@endsection

