@extends('layouts.layout_doctor')

@section('title', 'Мой профиль')

@section('content')
    <h1>Мой профиль</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="profile-container">
        <table class="profile-table">
            <tbody>
            <tr><th>Имя пользователя</th><td>{{ $user->name }}</td></tr>
            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
            <tr><th>Имя</th><td>{{ $user->first_name }}</td></tr>
            <tr><th>Фамилия</th><td>{{ $user->last_name }}</td></tr>
            <tr><th>PESEL</th><td>{{ $user->pesel }}</td></tr>
            <!-- Добавьте другие поля, если нужно -->
            </tbody>
        </table>
        <a href="{{ route('doctor.profile.edit') }}" class="btn btn-primary edit-profile-btn">Редактировать профиль</a>
    </div>
@endsection
