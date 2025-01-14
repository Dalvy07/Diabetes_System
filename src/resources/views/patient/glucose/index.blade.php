{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Мои измерения глюкозы')--}}

{{--@section('content')--}}
{{--    <h1>Измерения глюкозы</h1>--}}

{{--    <div class="top-action" style="margin-bottom: 1rem;">--}}
{{--        <a href="{{ route('patient.glucose.create') }}" class="btn btn-primary">--}}
{{--            Добавить новое измерение--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <!-- Одна форма с двумя кнопками -->--}}
{{--    <form method="GET" action="{{ route('patient.glucose.index') }}" class="filter-form">--}}
{{--        <label for="start_date">С:</label>--}}
{{--        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">--}}

{{--        <label for="end_date">По:</label>--}}
{{--        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">--}}

{{--        <div class="button-container">--}}
{{--            <button type="submit" name="action" value="range" class="btn btn-primary">--}}
{{--                Показать записи в диапазоне--}}
{{--            </button>--}}
{{--            <button type="submit" name="action" value="latest" class="btn btn-secondary">--}}
{{--                Показать последние записи--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </form>--}}



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
{{--                <th>Примечания--}}
{{--                <th>Действия</th> <!-- Новая колонка для действий -->--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @forelse($measurements as $m)--}}
{{--                <tr>--}}
{{--                    <td>{{ $m->measurement_datetime }}</td>--}}
{{--                    <td>{{ $m->glucose_level }}</td>--}}
{{--                    <td>{{ $m->is_before_meal ? 'Да' : 'Нет' }}</td>--}}
{{--                    <td>{{ $m->note }}</td>--}}
{{--                    <td>--}}
{{--                        <!-- Ссылка для удаления -->--}}
{{--                        <a href="#"--}}
{{--                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $m->id }}').submit();"--}}
{{--                           title="Удалить"--}}
{{--                           style="margin-right: 0.5rem;">--}}
{{--                            🗑️--}}
{{--                        </a>--}}

{{--                        <!-- Ссылка для редактирования -->--}}
{{--                        <a href="{{ route('patient.glucose.edit', $m->id) }}" title="Редактировать">--}}
{{--                            ✏️--}}
{{--                        </a>--}}

{{--                        <!-- Скрытая форма для удаления -->--}}
{{--                        <form id="delete-form-{{ $m->id }}" action="{{ route('patient.glucose.destroy', $m->id) }}" method="POST" style="display: none;">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                        </form>--}}
{{--                    </td>--}}
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
{{--        @if(method_exists($measurements, 'links'))--}}
{{--            {{ $measurements->links() }}--}}
{{--        @endif--}}
{{--    </div>--}}

{{--@endsection--}}






@extends('layouts.layout_patient')

@section('title', 'My Glucose Measurements')

@section('content')
    <h1>Glucose Measurements</h1>

    <div class="top-action" style="margin-bottom: 1rem;">
        <a href="{{ route('patient.glucose.create') }}" class="btn btn-primary">
            Add New Measurement
        </a>
    </div>

    <!-- One form with two buttons -->
    <form method="GET" action="{{ route('patient.glucose.index') }}" class="filter-form">
        <label for="start_date">From:</label>
        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">

        <label for="end_date">To:</label>
        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">

        <div class="button-container">
            <button type="submit" name="action" value="range" class="btn btn-primary">
                Show Records in Range
            </button>
            <button type="submit" name="action" value="latest" class="btn btn-secondary">
                Show Latest Records
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
                <th>Measurement Date</th>
                <th>Glucose Level</th>
                <th>Before Meal?</th>
                <th>Notes</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
            </thead>
            <tbody>
            @forelse($measurements as $m)
                <tr>
                    <td>{{ $m->measurement_datetime }}</td>
                    <td>{{ $m->glucose_level }}</td>
                    <td>{{ $m->is_before_meal ? 'Yes' : 'No' }}</td>
                    <td>{{ $m->note }}</td>
                    <td>
                        <!-- Link for deletion -->
                        <a href="#"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $m->id }}').submit();"
                           title="Delete"
                           style="margin-right: 0.5rem;">
                            🗑️
                        </a>

                        <!-- Link for editing -->
                        <a href="{{ route('patient.glucose.edit', $m->id) }}" title="Edit">
                            ✏️
                        </a>

                        <!-- Hidden form for deletion -->
                        <form id="delete-form-{{ $m->id }}" action="{{ route('patient.glucose.destroy', $m->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No measurement data available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        @if(method_exists($measurements, 'links'))
            {{ $measurements->links() }}
        @endif
    </div>
@endsection
