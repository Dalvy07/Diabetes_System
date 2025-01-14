{{--@extends('layouts.layout_patient')--}}

{{-- Заголовок страницы --}}
{{--@section('title', 'Панель Пациента')--}}

{{-- Hero-секция (по желанию) --}}
{{--@section('hero')--}}
{{--    <section class="hero-section">--}}
{{--        <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>--}}
{{--        <p>Здесь вы можете просматривать и обновлять свои медицинские данные, а также общаться с врачами.</p>--}}
{{--    </section>--}}
{{--@endsection--}}


{{-- Функциональные блоки (Features), если нужны --}}
{{--@section('features')--}}
{{--    <section class="features-section">--}}
{{--        <h2>Основные возможности</h2>--}}
{{--        <ul>--}}
{{--            <li>Просмотр и редактирование профиля</li>--}}
{{--            <li>Добавление медицинских данных (глюкоза, диета, активность и т. д.)</li>--}}
{{--            <li>Просмотр рекомендаций доктора</li>--}}
{{--        </ul>--}}
{{--    </section>--}}
{{--@endsection--}}

{{-- Основной контент --}}
{{--@section('content')--}}
{{--    <div class="dashboard-content">--}}
{{--        <h3>Ваша медицинская информация</h3>--}}
{{--        <p>Здесь вы найдёте сводку последних измерений, рекомендаций по лечению и другую полезную информацию.</p>--}}
{{--        --}}{{-- Дополните контент своими данными --}}
{{--    </div>--}}
{{--@endsection--}}








@extends('layouts.layout_patient')

{{-- Page Title --}}
@section('title', 'Patient Dashboard')

{{-- Hero Section (optional) --}}
@section('hero')
    <section class="hero-section">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p>Here you can view and update your medical data, as well as communicate with doctors.</p>
    </section>
@endsection

{{-- Feature Blocks (if needed) --}}
@section('features')
    <section class="features-section">
        <h2>Main Features</h2>
        <ul>
            <li>View and edit profile</li>
            <li>Add medical data (glucose, diet, activity, etc.)</li>
            <li>View doctor’s recommendations</li>
        </ul>
    </section>
@endsection

{{-- Main Content --}}
@section('content')
    <div class="dashboard-content">
        <h3>Your Medical Information</h3>
        <p>Here you will find a summary of your latest measurements, treatment recommendations, and other useful information.</p>
        {{-- Add your content here --}}
    </div>
@endsection
