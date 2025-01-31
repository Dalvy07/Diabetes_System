{{--@extends('layouts.layout_basic')--}}

{{--@section('title', 'Регистрация Доктора')--}}

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
{{--        <h2>Регистрация Доктора</h2>--}}

{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('doctor.register') }}" class="auth-form">--}}
{{--            @csrf--}}

{{--            <h3 class="form-section-title">Основные данные</h3>--}}
{{--            <div class="form-group">--}}
{{--                <label for="name">Имя пользователя</label>--}}
{{--                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>--}}
{{--            </div>--}}

{{--            <!-- Новые поля для доктора -->--}}
{{--            <div class="form-group">--}}
{{--                <label for="first_name">Имя</label>--}}
{{--                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-input" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="last_name">Фамилия</label>--}}
{{--                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-input" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="pesel">PESEL</label>--}}
{{--                <input type="text" name="pesel" id="pesel" value="{{ old('pesel') }}" class="form-input" required maxlength="11" minlength="11">--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="email">Email</label>--}}
{{--                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="password">Пароль</label>--}}
{{--                <input type="password" name="password" id="password" class="form-input" required>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="password_confirmation">Подтверждение пароля</label>--}}
{{--                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>--}}
{{--            </div>--}}

{{--            <h3 class="form-section-title">Данные для Доктора</h3>--}}
{{--            <div class="form-group">--}}
{{--                <label for="specializations">Специализации (через запятую)</label>--}}
{{--                <input type="text" name="specializations" id="specializations" value="{{ old('specializations') }}" class="form-input">--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="certifications">Сертификаты (через запятую)</label>--}}
{{--                <input type="text" name="certifications" id="certifications" value="{{ old('certifications') }}" class="form-input">--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="work_hours">Часы работы</label>--}}
{{--                <input type="text" name="work_hours" id="work_hours" value="{{ old('work_hours') }}" class="form-input">--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label>--}}
{{--                    <input type="checkbox" name="is_available" value="1" @if(old('is_available')) checked @endif>--}}
{{--                    Сейчас доступен?--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>--}}
{{--        </form>--}}

{{--        <p class="auth-footer-links">--}}
{{--            Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--@endsection--}}



@extends('layouts.layout_basic')

@section('title', 'Doctor Registration')

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
        <h2>Doctor Registration</h2>

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

            <h3 class="form-section-title">Basic Information</h3>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input" required>
            </div>

            <!-- New fields for the doctor -->
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="pesel">PESEL</label>
                <input type="text" name="pesel" id="pesel" value="{{ old('pesel') }}" class="form-input" required maxlength="11" minlength="11">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
            </div>

            <h3 class="form-section-title">Doctor's Information</h3>
            <div class="form-group">
                <label for="specializations">Specializations (comma-separated)</label>
                <input type="text" name="specializations" id="specializations" value="{{ old('specializations') }}" class="form-input">
            </div>

            <div class="form-group">
                <label for="certifications">Certifications (comma-separated)</label>
                <input type="text" name="certifications" id="certifications" value="{{ old('certifications') }}" class="form-input">
            </div>

            <div class="form-group">
                <label for="work_hours">Working Hours</label>
                <input type="text" name="work_hours" id="work_hours" value="{{ old('work_hours') }}" class="form-input">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_available" value="1" @if(old('is_available')) checked @endif>
                    Available Now?
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <p class="auth-footer-links">
            Already have an account? <a href="{{ route('login.form') }}">Login</a>
        </p>
    </div>
@endsection

