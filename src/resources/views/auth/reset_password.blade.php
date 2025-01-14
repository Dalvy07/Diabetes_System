{{--@extends('layouts.minimal')--}}

{{--@section('title', 'Сброс пароля')--}}

{{--@section('content')--}}
{{--    <div class="auth-form-container">--}}
{{--        <h2>Сброс пароля</h2>--}}

{{--        <form action="{{ route('password.update') }}" method="POST" class="auth-form">--}}
{{--            @csrf--}}

{{--            --}}{{-- Токен сброса --}}
{{--            <input type="hidden" name="token" value="{{ $token }}">--}}
{{--            <input type="hidden" name="email" value="{{ $email }}">--}}

{{--            --}}{{-- Новый пароль --}}
{{--            <div class="form-group">--}}
{{--                <label for="password">Новый пароль</label>--}}
{{--                <input type="password" name="password" id="password" class="form-input" required>--}}
{{--            </div>--}}

{{--            @error('password')--}}
{{--            <div class="alert alert-danger">--}}
{{--                {{ $message }}--}}
{{--            </div>--}}
{{--            @enderror--}}

{{--            --}}{{-- Подтверждение пароля --}}
{{--            <div class="form-group">--}}
{{--                <label for="password_confirmation">Подтверждение пароля</label>--}}
{{--                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Сбросить пароль</button>--}}
{{--        </form>--}}

{{--        <p class="auth-footer-links">--}}
{{--            <a href="{{ route('login.form') }}">Вернуться к входу</a>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--@endsection--}}





@extends('layouts.minimal')

@section('title', 'Reset Password')

@section('content')
    <div class="auth-form-container">
        <h2>Reset Password</h2>

        <form action="{{ route('password.update') }}" method="POST" class="auth-form">
            @csrf

            {{-- Reset Token --}}
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            {{-- New Password --}}
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror

            {{-- Confirm Password --}}
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('login.form') }}">Back to Login</a>
        </p>
    </div>
@endsection
