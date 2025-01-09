@extends('layouts.layout_patient')

@section('title', 'Мои измерения глюкозы')

@section('content')
    <h1>Измерения глюкозы</h1>
    <a href="{{ route('patient.glucose.create') }}" class="btn btn-primary">Добавить новое измерение</a>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table>
        <thead>
        <tr>
            <th>Дата измерения</th>
            <th>Уровень глюкозы</th>
            <th>До еды?</th>
            <th>Примечания</th>
        </tr>
        </thead>
        <tbody>
        @forelse($measurements as $m)
            <tr>
                <td>{{ $m->measurement_datetime }}</td>
                <td>{{ $m->glucose_level }}</td>
                <td>{{ $m->is_before_meal ? 'Да' : 'Нет' }}</td>
                <td>{{ $m->note }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Нет данных об измерениях</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
