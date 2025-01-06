{{--<h1>Восстановление пароля</h1>--}}
{{--@if (session('status'))--}}
{{--    <p style="color: green;">{{ session('status') }}</p>--}}
{{--@endif--}}

{{--<form action="{{ route('password.email') }}" method="POST">--}}
{{--    @csrf--}}
{{--    <label>Email:</label>--}}
{{--    <input type="email" name="email" required>--}}
{{--    @error('email')--}}
{{--    <p style="color: red;">{{ $message }}</p>--}}
{{--    @enderror--}}
{{--    <button type="submit">Отправить ссылку для сброса</button>--}}
{{--</form>--}}




@extends('layouts.minimal')

@section('title', 'Восстановление пароля')

@section('content')
    <div class="auth-form-container">
        <h2>Восстановление пароля</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-input" required>
            </div>

            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror

            <button type="submit" class="btn btn-primary">Отправить ссылку для сброса</button>
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('login.form') }}">Вернуться к входу</a>
        </p>
    </div>
@endsection
