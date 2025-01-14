{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Мой профиль')--}}

{{--@section('content')--}}
{{--    <h1>Мой профиль</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <div class="profile-container">--}}
{{--        <table class="profile-table">--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <th>Имя пользователя</th>--}}
{{--                <td>{{ $user->name }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <tr>--}}
{{--                <th>Имя</th>--}}
{{--                <td>{{ $user->first_name }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>Фамилия</th>--}}
{{--                <td>{{ $user->last_name }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>Email</th>--}}
{{--                <td>{{ $user->email }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>Дата рождения</th>--}}
{{--                <td>{{ $patient->birth_date }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <th>Пол</th>--}}
{{--                <td>{{ $patient->gender }}</td>--}}
{{--            </tr>--}}
{{--            <!-- Добавьте другие поля профиля по необходимости -->--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        <a href="{{ route('patient.profile.edit') }}" class="btn btn-primary edit-profile-btn">--}}
{{--            Редактировать профиль--}}
{{--        </a>--}}
{{--    </div>--}}
{{--@endsection--}}









@extends('layouts.layout_patient')

@section('title', 'My Profile')

@section('content')
    <h1>My Profile</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="profile-container">
        <table class="profile-table">
            <tbody>
            <tr>
                <th>Username</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>First Name</th>
                <td>{{ $user->first_name }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $user->last_name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{ $patient->birth_date }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $patient->gender }}</td>
            </tr>
            <!-- Add other profile fields as needed -->
            </tbody>
        </table>

        <a href="{{ route('patient.profile.edit') }}" class="btn btn-primary edit-profile-btn">
            Edit Profile
        </a>
    </div>
@endsection
