{{--@extends('layouts.layout_doctor')--}}

{{--@section('title', 'Измерения глюкозы пациента')--}}

{{--@section('content')--}}
{{--    <h1>Измерения глюкозы для {{ $patient->user->first_name }} {{ $patient->user->last_name }}</h1>--}}

{{--    @if($glucoseMeasurements->isEmpty())--}}
{{--        <p>Нет данных об измерениях глюкозы для этого пациента.</p>--}}
{{--    @else--}}
{{--        <table class="glucose-table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Дата измерения</th>--}}
{{--                <th>Уровень глюкозы</th>--}}
{{--                <th>До еды?</th>--}}
{{--                <th>Примечания</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($glucoseMeasurements as $m)--}}
{{--                <tr>--}}
{{--                    <td>{{ $m->measurement_datetime }}</td>--}}
{{--                    <td>{{ $m->glucose_level }}</td>--}}
{{--                    <td>{{ $m->is_before_meal ? 'Да' : 'Нет' }}</td>--}}
{{--                    <td>{{ $m->note }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        {{ $glucoseMeasurements->links() }}--}}
{{--    @endif--}}
{{--@endsection--}}





@extends('layouts.layout_doctor')

@section('title', 'Patient Glucose Measurements')

@section('content')
    <h1>Glucose Measurements for {{ $patient->user->first_name }} {{ $patient->user->last_name }}</h1>

    @if($glucoseMeasurements->isEmpty())
        <p>No glucose measurement data available for this patient.</p>
    @else
        <table class="glucose-table">
            <thead>
            <tr>
                <th>Measurement Date</th>
                <th>Glucose Level</th>
                <th>Before Meal?</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($glucoseMeasurements as $m)
                <tr>
                    <td>{{ $m->measurement_datetime }}</td>
                    <td>{{ $m->glucose_level }}</td>
                    <td>{{ $m->is_before_meal ? 'Yes' : 'No' }}</td>
                    <td>{{ $m->note }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $glucoseMeasurements->links() }}
    @endif
@endsection
