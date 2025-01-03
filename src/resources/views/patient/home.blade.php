<!DOCTYPE html>
<html>
<head>
    <title>Главная пациента</title>
</head>
<body>

<h1>Здравствуйте, пациент!</h1>

<p>
    Имя пользователя: <strong>{{ Auth::user()->name }}</strong><br>
    Email: <strong>{{ Auth::user()->email }}</strong>
</p>

@if (Auth::user()->patient)
    <p>
        <strong>Дата рождения:</strong>
        {{ Auth::user()->patient->birth_date }}<br>
        <strong>Пол:</strong>
        {{ Auth::user()->patient->gender }}
    </p>
@else
    <p>Данные о пациенте не найдены.</p>
@endif

<hr>

<p>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Выйти
    </a>
</p>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

</body>
</html>
