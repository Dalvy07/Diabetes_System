@extends('layouts.layout_doctor')

@section('title', 'Редактировать профиль')

@section('content')
    <h1>Редактировать профиль</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctor.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Добавьте поля аналогично пациенту -->
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" name="name" id="name" class="form-input"
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-input"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" id="first_name" class="form-input"
                   value="{{ old('first_name', $user->first_name) }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input type="text" name="last_name" id="last_name" class="form-input"
                   value="{{ old('last_name', $user->last_name) }}" required>
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" name="pesel" id="pesel" class="form-input"
                   value="{{ old('pesel', $user->pesel) }}" required maxlength="11" minlength="11">
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
