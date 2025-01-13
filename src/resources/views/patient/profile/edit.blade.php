@extends('layouts.layout_patient')

@section('title', 'Редактировать профиль')

@section('content')
    <h1>Редактировать профиль</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patient.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" class="form-input"
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-input"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="birth_date">Дата рождения</label>
            <input type="date" name="birth_date" id="birth_date" class="form-input"
                   value="{{ old('birth_date', $patient->birth_date) }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Пол</label>
            <select name="gender" id="gender" class="form-input" required>
                <option value="male" @if(old('gender', $patient->gender) === 'male') selected @endif>Мужской</option>
                <option value="female" @if(old('gender', $patient->gender) === 'female') selected @endif>Женский</option>
                <option value="other" @if(old('gender', $patient->gender) === 'other') selected @endif>Другое</option>
            </select>
        </div>

        <!-- Добавьте другие поля по необходимости -->

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
