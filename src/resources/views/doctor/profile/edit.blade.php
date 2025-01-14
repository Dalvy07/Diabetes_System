{{--@extends('layouts.layout_doctor')--}}

{{--@section('title', 'Редактировать профиль')--}}

{{--@section('content')--}}
{{--    <h1>Редактировать профиль</h1>--}}

{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <form action="{{ route('doctor.profile.update') }}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        <!-- Добавьте поля аналогично пациенту -->--}}
{{--        <div class="form-group">--}}
{{--            <label for="name">Имя пользователя</label>--}}
{{--            <input type="text" name="name" id="name" class="form-input"--}}
{{--                   value="{{ old('name', $user->name) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="email">Email</label>--}}
{{--            <input type="email" name="email" id="email" class="form-input"--}}
{{--                   value="{{ old('email', $user->email) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="first_name">Имя</label>--}}
{{--            <input type="text" name="first_name" id="first_name" class="form-input"--}}
{{--                   value="{{ old('first_name', $user->first_name) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="last_name">Фамилия</label>--}}
{{--            <input type="text" name="last_name" id="last_name" class="form-input"--}}
{{--                   value="{{ old('last_name', $user->last_name) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="pesel">PESEL</label>--}}
{{--            <input type="text" name="pesel" id="pesel" class="form-input"--}}
{{--                   value="{{ old('pesel', $user->pesel) }}" required maxlength="11" minlength="11">--}}
{{--        </div>--}}

{{--        <button type="submit" class="btn btn-primary">Сохранить изменения</button>--}}
{{--    </form>--}}
{{--@endsection--}}





{{--@extends('layouts.layout_doctor')--}}

{{--@section('title', 'Edit Profile')--}}

{{--@section('content')--}}
{{--    <h1>Edit Profile</h1>--}}

{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <form action="{{ route('doctor.profile.update') }}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        <!-- Add fields similarly to the patient -->--}}
{{--        <div class="form-group">--}}
{{--            <label for="name">Username</label>--}}
{{--            <input type="text" name="name" id="name" class="form-input"--}}
{{--                   value="{{ old('name', $user->name) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="email">Email</label>--}}
{{--            <input type="email" name="email" id="email" class="form-input"--}}
{{--                   value="{{ old('email', $user->email) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="first_name">First Name</label>--}}
{{--            <input type="text" name="first_name" id="first_name" class="form-input"--}}
{{--                   value="{{ old('first_name', $user->first_name) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="last_name">Last Name</label>--}}
{{--            <input type="text" name="last_name" id="last_name" class="form-input"--}}
{{--                   value="{{ old('last_name', $user->last_name) }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="pesel">PESEL</label>--}}
{{--            <input type="text" name="pesel" id="pesel" class="form-input"--}}
{{--                   value="{{ old('pesel', $user->pesel) }}" required maxlength="11" minlength="11">--}}
{{--        </div>--}}

{{--        <button type="submit" class="btn btn-primary">Save Changes</button>--}}
{{--    </form>--}}
{{--@endsection--}}





@extends('layouts.layout_doctor')

@section('title', 'Edit Profile')

@section('content')
    <h1>Edit Profile</h1>

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

        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name="name" id="name" class="form-input"
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-input"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-input"
                   value="{{ old('first_name', $user->first_name) }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-input"
                   value="{{ old('last_name', $user->last_name) }}" required>
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" name="pesel" id="pesel" class="form-input"
                   value="{{ old('pesel', $user->pesel) }}" required maxlength="11" minlength="11">
        </div>

        <div class="form-group">
            <label for="specializations">Specializations (comma-separated)</label>
            <input type="text" name="specializations" id="specializations" class="form-input"
                   value="{{ old('specializations', implode(', ', $doctor->specializations ?? [])) }}">
        </div>

        <div class="form-group">
            <label for="certificates">Certificates (comma-separated)</label>
            <input type="text" name="certificates" id="certificates" class="form-input"
                   value="{{ old('certificates', implode(', ', $doctor->certificates ?? [])) }}">
        </div>

        <div class="form-group">
            <label for="work_hours">Work Hours</label>
            <input type="text" name="work_hours" id="work_hours" class="form-input"
                   value="{{ old('work_hours', $doctor->work_hours) }}">
        </div>

        <div class="form-group">
            <label for="is_available">Currently Available</label>
            <input type="checkbox" name="is_available" id="is_available" value="1"
                {{ old('is_available', $doctor->is_available) ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
@endsection
