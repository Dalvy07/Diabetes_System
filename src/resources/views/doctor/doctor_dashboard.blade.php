@extends('layouts.layout_doctor')

{{-- Заголовок страницы --}}
@section('title', 'Панель Доктора')


{{-- Hero-секция (по желанию) --}}
@section('hero')
    <section class="hero-section">
        <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>
        <p>Это ваша панель управления, где вы можете управлять пациентами и своим профилем.</p>
    </section>
@endsection


{{-- Функциональные блоки (Features), если нужны --}}
@section('features')
    <section class="features-section">
        <h2>Основные функции</h2>
        <ul>
            <li>Просмотр и редактирование профиля</li>
            <li>Управление списком пациентов</li>
            <li>Добавление записей и назначений</li>
        </ul>
    </section>
@endsection


{{-- Основной контент --}}
@section('content')
    <div class="dashboard-content">
        <h3>Информация о практике</h3>
        <p>Здесь вы можете увидеть последние обновления, заявки пациентов и другую важную информацию.</p>
        {{-- Дополните контент своими данными --}}
    </div>
@endsection
