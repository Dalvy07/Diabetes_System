<!DOCTYPE html>
<html>
<head>
    <title>Регистрация Пациента</title>
</head>
<body>
<h1>Регистрация Пациента</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Форма регистрации пациента -->
<form method="POST" action="{{ route('patient.register') }}">
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
    <h3>Данные для Пациента</h3>
    <div>
        <label>Дата рождения:</label>
        <input type="date" name="birth_date" value="{{ old('birth_date') }}">
    </div>

    <div>
        <label>Пол:</label>
        <select name="gender">
            <option value="">Выбрать...</option>
            <option value="male"   @if(old('gender')==='male') selected @endif>Мужской</option>
            <option value="female" @if(old('gender')==='female') selected @endif>Женский</option>
            <option value="other"  @if(old('gender')==='other') selected @endif>Другое</option>
        </select>
    </div>

    <button type="submit">Зарегистрироваться</button>
</form>

<hr>
<p>Уже есть аккаунт? <a href="{{ route('login.form') }}">Войти</a></p>
</body>
</html>
