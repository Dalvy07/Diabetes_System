{{--@extends('layouts.layout_doctor')--}}

{{--@section('title', 'Планы лечения для ' . $patient->user->first_name . ' ' . $patient->user->last_name)--}}

{{--@section('content')--}}
{{--    <h1>Планы лечения для {{ $patient->user->first_name }} {{ $patient->user->last_name }}</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @endif--}}

{{--    @if($treatmentPlans->isEmpty())--}}
{{--        <p>Нет планов лечения для этого пациента.</p>--}}
{{--    @else--}}
{{--        <table class="treatment-plans-table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID плана</th>--}}
{{--                <th>Дата создания</th>--}}
{{--                <th>Статус</th>--}}
{{--                <th>Действия</th> <!-- Новая колонка для функционала -->--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($treatmentPlans as $plan)--}}
{{--                <tr>--}}
{{--                    <td>{{ $plan->id }}</td>--}}
{{--                    <td>{{ $plan->creation_date }}</td>--}}
{{--                    <td>{{ $plan->status }}</td>--}}
{{--                    <td>--}}
{{--                        <!-- Ссылка для просмотра деталей плана -->--}}
{{--                        <a href="{{ route('doctor.treatment_plan.view', $plan->id) }}" class="btn btn-secondary btn-sm" title="Просмотр деталей">--}}
{{--                            👁️ Просмотр--}}
{{--                        </a>--}}

{{--                        <!-- Ссылка для редактирования плана -->--}}
{{--                        <a href="{{ route('doctor.treatment_plan.edit', $plan->id) }}" class="btn btn-primary btn-sm" title="Редактировать">--}}
{{--                            ✏️ Редактировать--}}
{{--                        </a>--}}

{{--                        <!-- Форма для удаления плана с подтверждением -->--}}
{{--                        <a href="#"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                        if(confirm('Вы уверены, что хотите удалить этот план лечения?')) {--}}
{{--                                            document.getElementById('delete-plan-form-{{ $plan->id }}').submit();--}}
{{--                                        }"--}}
{{--                           class="btn btn-danger btn-sm" title="Удалить">--}}
{{--                            🗑️ Удалить--}}
{{--                        </a>--}}
{{--                        <form id="delete-plan-form-{{ $plan->id }}" action="{{ route('doctor.treatment_plan.destroy', $plan->id) }}" method="POST" style="display: none;">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    @endif--}}
{{--@endsection--}}






@extends('layouts.layout_doctor')

@section('title', 'Treatment Plans for ' . $patient->user->first_name . ' ' . $patient->user->last_name)

@section('content')
    <h1>Treatment Plans for {{ $patient->user->first_name }} {{ $patient->user->last_name }}</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if($treatmentPlans->isEmpty())
        <p>No treatment plans available for this patient.</p>
    @else
        <table class="treatment-plans-table">
            <thead>
            <tr>
                <th>Plan ID</th>
                <th>Creation Date</th>
                <th>Status</th>
                <th>Actions</th> <!-- New column for functionality -->
            </tr>
            </thead>
            <tbody>
            @foreach($treatmentPlans as $plan)
                <tr>
                    <td>{{ $plan->id }}</td>
                    <td>{{ $plan->creation_date }}</td>
                    <td>{{ $plan->status }}</td>
                    <td>
                        <!-- Link to view plan details -->
                        <a href="{{ route('doctor.treatment_plan.view', $plan->id) }}" class="btn btn-secondary btn-sm" title="View Details">
                            👁️ View
                        </a>

                        <!-- Link to edit plan -->
                        <a href="{{ route('doctor.treatment_plan.edit', $plan->id) }}" class="btn btn-primary btn-sm" title="Edit">
                            ✏️ Edit
                        </a>

                        <!-- Form to delete plan with confirmation -->
                        <a href="#"
                           onclick="event.preventDefault();
                                        if(confirm('Are you sure you want to delete this treatment plan?')) {
                                            document.getElementById('delete-plan-form-{{ $plan->id }}').submit();
                                        }"
                           class="btn btn-danger btn-sm" title="Delete">
                            🗑️ Delete
                        </a>
                        <form id="delete-plan-form-{{ $plan->id }}" action="{{ route('doctor.treatment_plan.destroy', $plan->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
