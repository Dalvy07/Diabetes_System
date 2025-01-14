{{--@extends('layouts.minimal')--}}

{{--@section('title', 'Подтверждение Email')--}}

{{--@section('content')--}}
{{--    <div class="auth-form-container">--}}
{{--        <h2>Подтвердите ваш email</h2>--}}

{{--        <p>--}}
{{--            Мы отправили письмо на ваш email. Пожалуйста, перейдите по ссылке в письме, чтобы подтвердить адрес.--}}
{{--        </p>--}}

{{--        @if (session('message'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('message') }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <!-- Ссылка, которая отправляет скрытую форму -->--}}
{{--        <a href="#"--}}
{{--           onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();"--}}
{{--           class="btn btn-primary">--}}
{{--            Отправить письмо снова--}}
{{--        </a>--}}

{{--        <!-- Скрытая форма для отправки письма -->--}}
{{--        <form id="resend-verification-form" action="{{ route('verification.send') }}" method="POST" style="display: none;">--}}
{{--            @csrf--}}
{{--        </form>--}}

{{--        <p class="auth-footer-links">--}}
{{--            <a href="{{ route('login.form') }}">Вернуться к входу</a>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--@endsection--}}






@extends('layouts.minimal')

@section('title', 'Email Verification')

@section('content')
    <div class="auth-form-container">
        <h2>Verify Your Email</h2>

        <p>
            We have sent an email to your address. Please click the link in the email to verify your address.
        </p>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Link that triggers the hidden form -->
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('resend-verification-form').submit();"
           class="btn btn-primary">
            Resend Verification Email
        </a>

        <!-- Hidden form to resend the verification email -->
        <form id="resend-verification-form" action="{{ route('verification.send') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('login.form') }}">Back to Login</a>
        </p>
    </div>
@endsection
