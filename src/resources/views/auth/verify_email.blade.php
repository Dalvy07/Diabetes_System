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

{{--        <form method="POST" action="{{ route('verification.send') }}" class="auth-form">--}}
{{--            @csrf--}}
{{--            <button type="submit" class="btn btn-primary">Отправить письмо снова</button>--}}
{{--        </form>--}}
        <!-- Ссылка, которая отправляет скрытую форму -->
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();"
           class="btn btn-primary">
            Отправить письмо снова
        </a>

        <!-- Скрытая форма для отправки письма -->
        <form id="resend-verification-form" action="{{ route('verification.send') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('login.form') }}">Вернуться к входу</a>
        </p>
    </div>
@endsection

