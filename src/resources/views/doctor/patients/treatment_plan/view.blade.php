@extends('layouts.layout_doctor')

@section('title', 'Детали плана лечения')

@section('content')
    <h1>Детали плана лечения #{{ $plan->id }}</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table class="treatment-details-table">
        <tbody>
        <tr>
            <th>Пациент:</th>
            <td>{{ $plan->patient->user->first_name }} {{ $plan->patient->user->last_name }}</td>
        </tr>
        <tr>
            <th>Доктор:</th>
            <td>{{ $plan->doctor->user->first_name }} {{ $plan->doctor->user->last_name }}</td>
        </tr>
        <tr>
            <th>Дата создания:</th>
            <td>{{ $plan->creation_date }}</td>
        </tr>
        <tr>
            <th>Последнее обновление:</th>
            <td>{{ $plan->last_updated }}</td>
        </tr>
        <tr>
            <th>Статус:</th>
            <td>{{ $plan->status }}</td>
        </tr>
        <tr>
            <th>Диетические рекомендации:</th>
            <td>{{ $plan->diet_recommendations }}</td>
        </tr>
        <tr>
            <th>Рекомендации по активности:</th>
            <td>{{ $plan->activity_recommendations }}</td>
        </tr>
        <tr>
            <th>План медикаментов:</th>
            <td>{{ is_string($plan->medication_plan) ? trim($plan->medication_plan, '"') : $plan->medication_plan }}</td>
        </tr>
        <tr>
            <th>Цель по глюкозе:</th>
            <td>{{ $plan->glucose_target }}</td>
        </tr>
        <tr>
            <th>Цель по весу:</th>
            <td>{{ $plan->weight_target }}</td>
        </tr>
        <tr>
            <th>Примечание:</th>
            <td>{{ $plan->note }}</td>
        </tr>
        </tbody>
    </table>

    <a href="{{ route('doctor.treatment_plan.edit', $plan->id) }}" class="btn btn-primary">
        Редактировать план
    </a>
    <a href="#"
       onclick="event.preventDefault();
            if(confirm('Вы уверены, что хотите удалить план лечения?')) {
                document.getElementById('delete-plan-form-{{ $plan->id }}').submit();
            }"
       class="btn btn-danger"
       title="Удалить план">
        Удалить план
    </a>
    <form id="delete-plan-form-{{ $plan->id }}" action="{{ route('doctor.treatment_plan.destroy', $plan->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection
