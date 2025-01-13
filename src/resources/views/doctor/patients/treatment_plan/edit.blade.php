@extends('layouts.layout_doctor')

@section('title', 'Редактировать план лечения')

@section('content')
    <h1>Редактировать план лечения #{{ $plan->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctor.treatment_plan.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="diet_recommendations">Рекомендации по диете</label>
            <textarea name="diet_recommendations" id="diet_recommendations" class="form-input">{{ old('diet_recommendations', $plan->diet_recommendations) }}</textarea>
        </div>

        <div class="form-group">
            <label for="activity_recommendations">Рекомендации по активности</label>
            <textarea name="activity_recommendations" id="activity_recommendations" class="form-input">{{ old('activity_recommendations', $plan->activity_recommendations) }}</textarea>
        </div>

        <div class="form-group">
            <label for="medication_plan">План приема лекарств</label>
            <textarea name="medication_plan" id="medication_plan" class="form-input">{{ old('medication_plan', $plan->medication_plan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="glucose_target">Цель по глюкозе</label>
            <input type="number" step="0.1" name="glucose_target" id="glucose_target" class="form-input" value="{{ old('glucose_target', $plan->glucose_target) }}">
        </div>

        <div class="form-group">
            <label for="weight_target">Цель по весу</label>
            <input type="number" step="0.1" name="weight_target" id="weight_target" class="form-input" value="{{ old('weight_target', $plan->weight_target) }}">
        </div>

        <div class="form-group">
            <label for="note">Примечание</label>
            <textarea name="note" id="note" class="form-input">{{ old('note', $plan->note) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" id="status" class="form-input" required>
                <option value="active" @if(old('status', $plan->status) === 'active') selected @endif>Активный</option>
                <option value="completed" @if(old('status', $plan->status) === 'completed') selected @endif>Завершён</option>
                <option value="pending" @if(old('status', $plan->status) === 'pending') selected @endif>В ожидании</option>
                <!-- Добавьте другие статусы при необходимости -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
