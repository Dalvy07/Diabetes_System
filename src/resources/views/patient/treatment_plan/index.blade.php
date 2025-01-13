{{--@extends('layouts.layout_patient')--}}

{{--@section('title', 'Мои планы лечения')--}}

{{--@section('content')--}}
{{--    <h1>Мои планы лечения</h1>--}}

{{--    @if($treatmentPlans->isEmpty())--}}
{{--        <p>У вас пока нет планов лечения.</p>--}}
{{--    @else--}}
{{--        <table class="treatment-plans-table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID плана</th>--}}
{{--                <th>Дата создания</th>--}}
{{--                <th>Статус</th>--}}
{{--                <th>Примечание</th>--}}
{{--                <!-- Добавьте другие заголовки по необходимости -->--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($treatmentPlans as $plan)--}}
{{--                <tr>--}}
{{--                    <td>{{ $plan->id }}</td>--}}
{{--                    <td>{{ $plan->creation_date }}</td>--}}
{{--                    <td>{{ $plan->status }}</td>--}}
{{--                    <td>{{ $plan->note }}</td>--}}
{{--                    <!-- Добавьте другие колонки по необходимости -->--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        {{ $treatmentPlans->links() }}--}}
{{--    @endif--}}
{{--@endsection--}}



@extends('layouts.layout_patient')

@section('title', 'Мои планы лечения')

@section('content')
    <h1>Мои планы лечения</h1>

    @if($treatmentPlans->isEmpty())
        <p>У вас пока нет планов лечения.</p>
    @else
        <table class="treatment-plans-table">
            <thead>
            <tr>
                <th>ID плана</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Примечание</th>
                <th>Действия</th> <!-- Новый столбец для кнопок -->
            </tr>
            </thead>
            <tbody>
            @foreach($treatmentPlans as $plan)
                <tr>
                    <td>{{ $plan->id }}</td>
                    <td>{{ $plan->creation_date }}</td>
                    <td>{{ $plan->status }}</td>
                    <td>{{ $plan->note }}</td>
                    <td>
                        <a href="{{ route('patient.treatment_plan.view', $plan->id) }}"
                           class="btn btn-secondary btn-sm"
                           title="Просмотр плана">
                            👁️ Просмотр
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $treatmentPlans->links() }}
    @endif
@endsection
