{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Детали плана лечения')--}}

{{--@section('content')--}}
{{--    <h1>Детали плана лечения #{{ $plan->id }}</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    <table class="treatment-details-table">--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <th>Пациент:</th>--}}
{{--            <td>{{ $plan->patient->user->first_name }} {{ $plan->patient->user->last_name }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Доктор:</th>--}}
{{--            <td>{{ $plan->doctor->user->first_name }} {{ $plan->doctor->user->last_name }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Дата создания:</th>--}}
{{--            <td>{{ $plan->creation_date }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Последнее обновление:</th>--}}
{{--            <td>{{ $plan->last_updated }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Статус:</th>--}}
{{--            <td>{{ $plan->status }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Диетические рекомендации:</th>--}}
{{--            <td>{{ $plan->diet_recommendations }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Рекомендации по активности:</th>--}}
{{--            <td>{{ $plan->activity_recommendations }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>План медикаментов:</th>--}}
{{--            <td>{{ is_string($plan->medication_plan) ? trim($plan->medication_plan, '"') : $plan->medication_plan }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Цель по глюкозе:</th>--}}
{{--            <td>{{ $plan->glucose_target }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Цель по весу:</th>--}}
{{--            <td>{{ $plan->weight_target }}</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th>Примечание:</th>--}}
{{--            <td>{{ $plan->note }}</td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}

{{--    <a href="{{ route('patient.treatment_plan') }}" class="btn btn-secondary">Назад к списку планов</a>--}}
{{--@endsection--}}






@extends('layouts.layout_patient')

@section('title', 'Treatment Plan Details')

@section('content')
    <h1>Treatment Plan Details #{{ $plan->id }}</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table class="treatment-details-table">
        <tbody>
        <tr>
            <th>Patient:</th>
            <td>{{ $plan->patient->user->first_name }} {{ $plan->patient->user->last_name }}</td>
        </tr>
        <tr>
            <th>Doctor:</th>
            <td>{{ $plan->doctor->user->first_name }} {{ $plan->doctor->user->last_name }}</td>
        </tr>
        <tr>
            <th>Creation Date:</th>
            <td>{{ $plan->creation_date }}</td>
        </tr>
        <tr>
            <th>Last Updated:</th>
            <td>{{ $plan->last_updated }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $plan->status }}</td>
        </tr>
        <tr>
            <th>Diet Recommendations:</th>
            <td>{{ $plan->diet_recommendations }}</td>
        </tr>
        <tr>
            <th>Activity Recommendations:</th>
            <td>{{ $plan->activity_recommendations }}</td>
        </tr>
        <tr>
            <th>Medication Plan:</th>
            <td>{{ is_string($plan->medication_plan) ? trim($plan->medication_plan, '"') : $plan->medication_plan }}</td>
        </tr>
        <tr>
            <th>Glucose Target:</th>
            <td>{{ $plan->glucose_target }}</td>
        </tr>
        <tr>
            <th>Weight Target:</th>
            <td>{{ $plan->weight_target }}</td>
        </tr>
        <tr>
            <th>Note:</th>
            <td>{{ $plan->note }}</td>
        </tr>
        </tbody>
    </table>

    <a href="{{ route('patient.treatment_plan') }}" class="btn btn-secondary">Back to Treatment Plans</a>
@endsection
