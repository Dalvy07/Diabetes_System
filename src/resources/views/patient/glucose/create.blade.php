@extends('layouts.layout_patient')

@section('title', 'Добавить измерение глюкозы')

@section('content')
    <h1>Добавить новое измерение</h1>

     Вывод ошибок валидации
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patient.glucose.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="glucose_level">Уровень глюкозы</label>
            <input type="number" step="0.1" name="glucose_level" id="glucose_level" required>
        </div>

        <div class="form-group">
            <label for="measurement_datetime">Дата и время измерения</label>
            <input type="datetime-local" name="measurement_datetime" id="measurement_datetime" required>
        </div>

        <div class="form-group">
            <input type="checkbox" name="is_before_meal" value="1" id="is_before_meal">
            <label for="is_before_meal">Измерение до еды?</label>
        </div>

        <div class="form-group">
            <label for="note">Примечание</label>
            <input type="text" name="note" id="note" maxlength="255">
        </div>


        <button type="submit">Сохранить</button>
    </form>
@endsection

