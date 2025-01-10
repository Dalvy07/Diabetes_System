@extends('layouts.layout_patient')

@section('title', 'Редактировать измерение глюкозы')

@section('content')
    <h1>Редактировать измерение глюкозы</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patient.glucose.update', $measurement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="glucose_level">Уровень глюкозы</label>
            <input type="number" step="0.1" name="glucose_level" id="glucose_level" required
                   value="{{ old('glucose_level', $measurement->glucose_level) }}">
        </div>

        <div class="form-group">
            <label for="measurement_datetime">Дата и время измерения</label>
            <input type="datetime-local" name="measurement_datetime" id="measurement_datetime" required
                   value="{{ old('measurement_datetime', \Carbon\Carbon::parse($measurement->measurement_datetime)->format('Y-m-d\TH:i')) }}">
        </div>

        <div class="form-group">
            <input type="checkbox" name="is_before_meal" id="is_before_meal" value="1"
                {{ old('is_before_meal', $measurement->is_before_meal) ? 'checked' : '' }}>
            <label for="is_before_meal">Измерение до еды?</label>
        </div>

        <div class="form-group">
            <label for="note">Примечание</label>
            <input type="text" name="note" id="note"
                   value="{{ old('note', $measurement->note) }}">
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
