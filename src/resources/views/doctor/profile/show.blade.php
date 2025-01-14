{{--@extends('layouts.layout_doctor')--}}

{{--@section('title', 'Мой профиль')--}}

{{--@section('content')--}}
{{--    <h1>Мой профиль</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <div class="profile-container">--}}
{{--        <table class="profile-table">--}}
{{--            <tbody>--}}
{{--            <tr><th>Имя пользователя</th><td>{{ $user->name }}</td></tr>--}}
{{--            <tr><th>Email</th><td>{{ $user->email }}</td></tr>--}}
{{--            <tr><th>Имя</th><td>{{ $user->first_name }}</td></tr>--}}
{{--            <tr><th>Фамилия</th><td>{{ $user->last_name }}</td></tr>--}}
{{--            <tr><th>PESEL</th><td>{{ $user->pesel }}</td></tr>--}}
{{--            <!-- Добавьте другие поля, если нужно -->--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--        <a href="{{ route('doctor.profile.edit') }}" class="btn btn-primary edit-profile-btn">Редактировать профиль</a>--}}
{{--    </div>--}}
{{--@endsection--}}







{{--@extends('layouts.layout_doctor')--}}

{{--@section('title', 'My Profile')--}}

{{--@section('content')--}}
{{--    <h1>My Profile</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <div class="profile-container">--}}
{{--        <table class="profile-table">--}}
{{--            <tbody>--}}
{{--            <tr><th>Username</th><td>{{ $user->name }}</td></tr>--}}
{{--            <tr><th>Email</th><td>{{ $user->email }}</td></tr>--}}
{{--            <tr><th>First Name</th><td>{{ $user->first_name }}</td></tr>--}}
{{--            <tr><th>Last Name</th><td>{{ $user->last_name }}</td></tr>--}}
{{--            <tr><th>PESEL</th><td>{{ $user->pesel }}</td></tr>--}}
{{--            <!-- Add other fields if needed -->--}}

{{--            </tbody>--}}
{{--        </table>--}}
{{--        <a href="{{ route('doctor.profile.edit') }}" class="btn btn-primary edit-profile-btn">Edit Profile</a>--}}
{{--    </div>--}}
{{--@endsection--}}





@extends('layouts.layout_doctor')

@section('title', 'My Profile')

@section('content')
    <h1>My Profile</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="profile-container">
        <table class="profile-table">
            <tbody>
            <tr><th>Username</th><td>{{ $user->name }}</td></tr>
            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
            <tr><th>First Name</th><td>{{ $user->first_name }}</td></tr>
            <tr><th>Last Name</th><td>{{ $user->last_name }}</td></tr>
            <tr><th>PESEL</th><td>{{ $user->pesel }}</td></tr>
            <tr>
                <th>Specializations</th>
                <td>{{ !empty($doctor->specializations) ? implode(', ', $doctor->specializations) : 'Not specified' }}</td>
            </tr>
            <tr>
                <th>Certificates</th>
                <td>{{ !empty($doctor->certificates) ? implode(', ', $doctor->certificates) : 'Not specified' }}</td>
            </tr>
            <tr>
                <th>Work Hours</th>
                <td>{{ $doctor->work_hours ?? 'Not specified' }}</td>
            </tr>
            <tr>
                <th>Currently Available</th>
                <td>{{ $doctor->is_available ? 'Yes' : 'No' }}</td>
            </tr>
            </tbody>
        </table>

        <a href="{{ route('doctor.profile.edit') }}" class="btn btn-primary edit-profile-btn">Edit Profile</a>
    </div>
@endsection

