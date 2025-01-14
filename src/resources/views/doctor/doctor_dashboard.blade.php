{{--@extends('layouts.layout_doctor')--}}

{{-- Заголовок страницы --}}
{{--@section('title', 'Панель Доктора')--}}


{{-- Hero-секция (по желанию) --}}
{{--@section('hero')--}}
{{--    <section class="hero-section">--}}
{{--        <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>--}}
{{--        <p>Это ваша панель управления, где вы можете управлять пациентами и своим профилем.</p>--}}
{{--    </section>--}}
{{--@endsection--}}


{{-- Функциональные блоки (Features), если нужны --}}
{{--@section('features')--}}
{{--    <section class="features-section">--}}
{{--        <h2>Основные функции</h2>--}}
{{--        <ul>--}}
{{--            <li>Просмотр и редактирование профиля</li>--}}
{{--            <li>Управление списком пациентов</li>--}}
{{--            <li>Добавление записей и назначений</li>--}}
{{--        </ul>--}}
{{--    </section>--}}
{{--@endsection--}}


{{-- Основной контент --}}
{{--@section('content')--}}
{{--    <div class="dashboard-content">--}}
{{--        <h3>Информация о практике</h3>--}}
{{--        <p>Здесь вы можете увидеть последние обновления, заявки пациентов и другую важную информацию.</p>--}}
{{--        --}}{{-- Дополните контент своими данными --}}
{{--    </div>--}}
{{--@endsection--}}






@extends('layouts.layout_doctor')

{{-- Page Title --}}
@section('title', 'Doctor Dashboard')

{{-- Hero Section (optional) --}}
@section('hero')
    <section class="hero-section">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p>This is your dashboard where you can manage patients and your profile.</p>
    </section>
@endsection

{{-- Feature Blocks (if needed) --}}
@section('features')
    <section class="features-section">
        <h2>Main Features</h2>
        <ul>
            <li>View and edit profile</li>
            <li>Manage patient list</li>
            <li>Add records and appointments</li>
        </ul>
    </section>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="dashboard-content">
        <h3>Practice Information</h3>
        <p>Here you can see the latest updates, patient requests, and other important information.</p>
        {{-- Add your data here --}}
    </div>
@endsection
