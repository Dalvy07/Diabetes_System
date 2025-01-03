<!DOCTYPE html>
<html>
<head>
    <title>Подтверждение Email</title>
</head>
<body>
<h1>Подтвердите ваш email</h1>

<p>
    Мы отправили письмо на ваш email. Пожалуйста, перейдите по ссылке в письме, чтобы подтвердить адрес.
</p>

@if (session('message'))
    <p style="color: green;">{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Отправить письмо снова</button>
</form>
</body>
</html>
