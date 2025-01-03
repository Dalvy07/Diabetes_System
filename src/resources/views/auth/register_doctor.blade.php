<!DOCTYPE html>
<html>
<head>
    <title>Регистрация Доктора</title>
</head>
<body>
<h1>Регистрация Доктора</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Форма регистрации доктора -->
<form method="POST" action="{{ route('doctor.register') }}">
    @csrf

    <h3>Основные данные (User)</h3>
    <div>
        <label>Имя:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Пароль:</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>Подтверждение пароля:</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <hr>
    <h3>Данные для Доктора</h3>
    <div>
        <label>Специализации (через запятую):</label>
        <input type="text" name="specializations" value="{{ old('specializations') }}">
    </div>

    <div>
        <label>Сертификаты (через запятую):</label>
        <input type="text" name="certifications" value="{{ old('certifications') }}">
    </div>

    <div>
        <label>Часы работы:</label>
        <input type="text" name="work_hours" value="{{ old('work_hours') }}">
    </div>

    <div>
        <label>Сейчас доступен?</label>
        <input type="checkbox" name="is_available" value="1"
               @if(old('is_available')) checked @endif>
    </div>

    <button type="submit">Зарегистрироваться</button>
</form>

<hr>
<p>Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a></p>
</body>
</html>
