{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Вход</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Вход в систему</h1>--}}

{{--@if ($errors->any())--}}
{{--    <div style="color:red;">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

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
{{--<p>Нет аккаунта?--}}
{{--    <a href="{{ route('doctor.register.form') }}">Регистрация Доктора</a> |--}}
{{--    <a href="{{ route('patient.register.form') }}">Регистрация Пациента</a>--}}
{{--</p>--}}
{{--</body>--}}
{{--</html>--}}

<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
</head>
<body>
<h1>Вход в систему</h1>

{{-- Отображение ошибок --}}
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Форма входа --}}
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Пароль:</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>
            <input type="checkbox" name="remember"> Запомнить меня
        </label>
    </div>

    <button type="submit">Войти</button>
</form>

<hr>

{{-- Ссылка для восстановления пароля --}}
<p>
    <a href="{{ route('password.request') }}">Забыли пароль?</a>
</p>

{{-- Ссылки для регистрации --}}
<p>Нет аккаунта?
    <a href="{{ route('doctor.register.form') }}">Регистрация Доктора</a> |
    <a href="{{ route('patient.register.form') }}">Регистрация Пациента</a>
</p>
</body>
</html>

