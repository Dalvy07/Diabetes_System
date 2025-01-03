<h1>Восстановление пароля</h1>
@if (session('status'))
    <p style="color: green;">{{ session('status') }}</p>
@endif

<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>
    @error('email')
    <p style="color: red;">{{ $message }}</p>
    @enderror
    <button type="submit">Отправить ссылку для сброса</button>
</form>
