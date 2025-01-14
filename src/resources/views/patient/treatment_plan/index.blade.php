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
{{--                <th>Действия</th> <!-- Новый столбец для кнопок -->--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($treatmentPlans as $plan)--}}
{{--                <tr>--}}
{{--                    <td>{{ $plan->id }}</td>--}}
{{--                    <td>{{ $plan->creation_date }}</td>--}}
{{--                    <td>{{ $plan->status }}</td>--}}
{{--                    <td>{{ $plan->note }}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{ route('patient.treatment_plan.view', $plan->id) }}"--}}
{{--                           class="btn btn-secondary btn-sm"--}}
{{--                           title="Просмотр плана">--}}
{{--                            👁️ Просмотр--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        {{ $treatmentPlans->links() }}--}}
{{--    @endif--}}
{{--@endsection--}}






@extends('layouts.layout_patient')

@section('title', 'My Treatment Plans')

@section('content')
    <h1>My Treatment Plans</h1>

    @if($treatmentPlans->isEmpty())
        <p>You don't have any treatment plans yet.</p>
    @else
        <table class="treatment-plans-table">
            <thead>
            <tr>
                <th>Plan ID</th>
                <th>Creation Date</th>
                <th>Status</th>
                <th>Note</th>
                <th>Actions</th> <!-- New column for buttons -->
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
                           title="View Plan">
                            👁️ View
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $treatmentPlans->links() }}
    @endif
@endsection
