<!DOCTYPE html>
<html>
<head>
    <title>Главная доктора</title>
</head>
<body>

<h1>Добро пожаловать, доктор!</h1>

<p>
    Имя пользователя: <strong>{{ Auth::user()->name }}</strong><br>
    Email: <strong>{{ Auth::user()->email }}</strong>
</p>

@if (Auth::user()->doctor)
    <p>
        <strong>Специализации:</strong>
        {{ implode(', ', Auth::user()->doctor->specializations ?? []) }}<br>
        <strong>Сертификаты:</strong>
        {{ implode(', ', Auth::user()->doctor->certificates ?? []) }}<br>
        <strong>Часы работы:</strong>
        {{ Auth::user()->doctor->work_hours }}<br>
        <strong>Доступен?:</strong>
        {{ Auth::user()->doctor->is_available ? 'Да' : 'Нет' }}
    </p>
@else
    <p>Данные о докторе не найдены.</p>
@endif

<hr>

<form method="POST" action="{{ route('account.delete') }}" onsubmit="return confirm('Вы уверены, что хотите удалить свой аккаунт? Это действие нельзя отменить.')">
    @csrf
    @method('DELETE')
    <button type="submit" style="color: red;">Удалить аккаунт</button>
</form>

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
