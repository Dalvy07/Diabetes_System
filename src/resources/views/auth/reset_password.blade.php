<h1>Сброс пароля</h1>

<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <label>Новый пароль:</label>
    <input type="password" name="password" required>
    @error('password')
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Подтверждение пароля:</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Сбросить пароль</button>
</form>
