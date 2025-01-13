{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Мой профиль')--}}

{{--@section('content')--}}
{{--    <h1>Мой профиль</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <div class="profile-info">--}}
{{--        <p><strong>Имя:</strong> {{ $user->name }}</p>--}}
{{--        <p><strong>Email:</strong> {{ $user->email }}</p>--}}
{{--        <p><strong>Дата рождения:</strong> {{ $patient->birth_date }}</p>--}}
{{--        <p><strong>Пол:</strong> {{ $patient->gender }}</p>--}}
{{--        <!-- Добавьте другие поля профиля по необходимости -->--}}
{{--    </div>--}}

{{--    <a href="{{ route('patient.profile.edit') }}" class="btn btn-primary">Редактировать профиль</a>--}}
{{--@endsection--}}



{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Мой профиль')--}}

{{--@section('content')--}}
{{--    <h1>Мой профиль</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <div class="profile-container">--}}
{{--        <div class="profile-info">--}}
{{--            <p><strong>Имя:</strong> {{ $user->name }}</p>--}}
{{--            <p><strong>Email:</strong> {{ $user->email }}</p>--}}
{{--            <p><strong>Дата рождения:</strong> {{ $patient->birth_date }}</p>--}}
{{--            <p><strong>Пол:</strong> {{ $patient->gender }}</p>--}}
{{--            <!-- Добавьте другие поля профиля по необходимости -->--}}
{{--        </div>--}}

{{--        <a href="{{ route('patient.profile.edit') }}" class="btn btn-primary edit-profile-btn">--}}
{{--            Редактировать профиль--}}
{{--        </a>--}}
{{--    </div>--}}
{{--@endsection--}}




@extends('layouts.layout_patient')

@section('title', 'Мой профиль')

@section('content')
    <h1>Мой профиль</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="profile-container">
        <table class="profile-table">
            <tbody>
            <tr>
                <th>Имя</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Дата рождения</th>
                <td>{{ $patient->birth_date }}</td>
            </tr>
            <tr>
                <th>Пол</th>
                <td>{{ $patient->gender }}</td>
            </tr>
            <!-- Добавьте другие поля профиля по необходимости -->
            </tbody>
        </table>

        <a href="{{ route('patient.profile.edit') }}" class="btn btn-primary edit-profile-btn">
            Редактировать профиль
        </a>
    </div>
@endsection

