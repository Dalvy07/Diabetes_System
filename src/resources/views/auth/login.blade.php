{{--@extends('layouts.layout_basic')--}}

{{--@section('title', 'Вход в систему')--}}

{{--@section('navbar')--}}
{{--    <div class="navbar-container">--}}
{{--        <a href="{{ route('landing') }}" class="navbar-logo">МедСистема</a>--}}
{{--        <ul class="navbar-menu">--}}
{{--            <li><a href="{{ route('landing') }}">Главная</a></li>--}}
{{--            <li><a href="{{ route('login.form') }}">Войти</a></li>--}}
{{--            <li class="dropdown">--}}
{{--                <a href="#" class="dropdown-toggle">Регистрация</a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li><a href="{{ route('doctor.register.form') }}">Доктора</a></li>--}}
{{--                    <li><a href="{{ route('patient.register.form') }}">Пациента</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="auth-form-container">--}}
{{--        <h2 class="auth-title">Вход в систему</h2>--}}

{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}" class="auth-form">--}}
{{--            @csrf--}}
{{--            <div class="form-group">--}}
{{--                <label for="email" class="form-label">Email</label>--}}
{{--                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="password" class="form-label">Пароль</label>--}}
{{--                <input type="password" name="password" id="password" class="form-input" required>--}}
{{--            </div>--}}
{{--            <div class="form-group form-check">--}}
{{--                <label>--}}
{{--                    <input type="checkbox" name="remember" class="form-check-input"> Запомнить меня--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary">Войти</button>--}}
{{--        </form>--}}

{{--        <p class="auth-footer-links">--}}
{{--            <a href="{{ route('password.request') }}">Забыли пароль?</a>--}}
{{--            <br>--}}
{{--            <a href="{{ route('doctor.register.form') }}">Регистрация (Доктор)</a> |--}}
{{--            <a href="{{ route('patient.register.form') }}">Регистрация (Пациент)</a>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--@endsection--}}




@extends('layouts.layout_basic')

@section('title', 'Login')

@section('navbar')
    <div class="navbar-container">
        <a href="{{ route('landing') }}" class="navbar-logo">MedSystem</a>
        <ul class="navbar-menu">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="{{ route('login.form') }}">Login</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Register</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('doctor.register.form') }}">Doctor</a></li>
                    <li><a href="{{ route('patient.register.form') }}">Patient</a></li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="auth-form-container">
        <h2 class="auth-title">Login</h2>

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
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>
            <div class="form-group form-check">
                <label>
                    <input type="checkbox" name="remember" class="form-check-input"> Remember Me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="auth-footer-links">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
            <br>
            <a href="{{ route('doctor.register.form') }}">Register (Doctor)</a> |
            <a href="{{ route('patient.register.form') }}">Register (Patient)</a>
        </p>
    </div>
@endsection
