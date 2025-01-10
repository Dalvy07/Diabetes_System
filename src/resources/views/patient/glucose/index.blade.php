{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Мои измерения глюкозы')--}}

{{--@section('content')--}}
{{--    <h1>Измерения глюкозы</h1>--}}
{{--    <a href="{{ route('patient.glucose.create') }}" class="btn btn-primary">Добавить новое измерение</a>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Дата измерения</th>--}}
{{--            <th>Уровень глюкозы</th>--}}
{{--            <th>До еды?</th>--}}
{{--            <th>Примечания</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @forelse($measurements as $m)--}}
{{--            <tr>--}}
{{--                <td>{{ $m->measurement_datetime }}</td>--}}
{{--                <td>{{ $m->glucose_level }}</td>--}}
{{--                <td>{{ $m->is_before_meal ? 'Да' : 'Нет' }}</td>--}}
{{--                <td>{{ $m->note }}</td>--}}
{{--            </tr>--}}
{{--        @empty--}}
{{--            <tr>--}}
{{--                <td colspan="4">Нет данных об измерениях</td>--}}
{{--            </tr>--}}
{{--        @endforelse--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--@endsection--}}


{{----------------------------------------------------------------------}}


{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Мои измерения глюкозы')--}}

{{--@section('content')--}}
{{--    <h1>Измерения глюкозы</h1>--}}

{{--    <!-- Кнопка "Добавить новое измерение" вверху страницы -->--}}
{{--    <div class="top-action" style="margin-bottom: 1rem;">--}}
{{--        <a href="{{ route('patient.glucose.create') }}" class="btn btn-primary">--}}
{{--            Добавить новое измерение--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <!-- Горизонтально растянутая форма фильтрации -->--}}
{{--    <form method="GET" action="{{ route('patient.glucose.index') }}" class="filter-form">--}}
{{--        <label for="start_date">С:</label>--}}
{{--        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">--}}

{{--        <label for="end_date">По:</label>--}}
{{--        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">--}}

{{--        <button type="submit" class="btn btn-primary">--}}
{{--            Показать записи в диапазоне--}}
{{--        </button>--}}
{{--    </form>--}}

{{--    <!-- Кнопка для показа последних записей -->--}}
{{--    <div class="show-latest" style="margin: 1rem 0;">--}}
{{--        <a href="{{ route('patient.glucose.index') }}" class="btn btn-primary">--}}
{{--            Показать последние записи--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <div class="scrollable-table-container">--}}
{{--        <table>--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Дата измерения</th>--}}
{{--                <th>Уровень глюкозы</th>--}}
{{--                <th>До еды?</th>--}}
{{--                <th>Примечания</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @forelse($measurements as $m)--}}
{{--                <tr>--}}
{{--                    <td>{{ $m->measurement_datetime }}</td>--}}
{{--                    <td>{{ $m->glucose_level }}</td>--}}
{{--                    <td>{{ $m->is_before_meal ? 'Да' : 'Нет' }}</td>--}}
{{--                    <td>{{ $m->note }}</td>--}}
{{--                </tr>--}}
{{--            @empty--}}
{{--                <tr>--}}
{{--                    <td colspan="4">Нет данных об измерениях</td>--}}
{{--                </tr>--}}
{{--            @endforelse--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

{{--    <div class="pagination-wrapper">--}}
{{--        {{ $measurements->links() }}--}}
{{--    </div>--}}
{{--@endsection--}}


{{----------------------------------------------------------------------}}


@extends('layouts.layout_patient')

@section('title', 'Мои измерения глюкозы')

@section('content')
    <h1>Измерения глюкозы</h1>

    <div class="top-action" style="margin-bottom: 1rem;">
        <a href="{{ route('patient.glucose.create') }}" class="btn btn-primary">
            Добавить новое измерение
        </a>
    </div>

    <!-- Одна форма с двумя кнопками -->
    <form method="GET" action="{{ route('patient.glucose.index') }}" class="filter-form">
        <label for="start_date">С:</label>
        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">

        <label for="end_date">По:</label>
        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">

        <div class="button-container">
            <button type="submit" name="action" value="range" class="btn btn-primary">
                Показать записи в диапазоне
            </button>
            <button type="submit" name="action" value="latest" class="btn btn-secondary">
                Показать последние записи
            </button>
        </div>
    </form>



    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="scrollable-table-container">
        <table>
            <thead>
            <tr>
                <th>Дата измерения</th>
                <th>Уровень глюкозы</th>
                <th>До еды?</th>
                <th>Примечания
                <th>Действия</th> <!-- Новая колонка для действий -->
            </tr>
            </thead>
            <tbody>
            @forelse($measurements as $m)
                <tr>
                    <td>{{ $m->measurement_datetime }}</td>
                    <td>{{ $m->glucose_level }}</td>
                    <td>{{ $m->is_before_meal ? 'Да' : 'Нет' }}</td>
                    <td>{{ $m->note }}</td>
                    <td>
                        <!-- Ссылка для удаления -->
                        <a href="#"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $m->id }}').submit();"
                           title="Удалить"
                           style="margin-right: 0.5rem;">
                            🗑️
                        </a>

                        <!-- Ссылка для редактирования -->
                        <a href="{{ route('patient.glucose.edit', $m->id) }}" title="Редактировать">
                            ✏️
                        </a>

                        <!-- Скрытая форма для удаления -->
                        <form id="delete-form-{{ $m->id }}" action="{{ route('patient.glucose.destroy', $m->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Нет данных об измерениях</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

{{--    <div class="pagination-wrapper">--}}
{{--        {{ $measurements->links() }}--}}
{{--    </div>--}}

    <div class="pagination-wrapper">
        @if(method_exists($measurements, 'links'))
            {{ $measurements->links() }}
        @endif
    </div>

@endsection
