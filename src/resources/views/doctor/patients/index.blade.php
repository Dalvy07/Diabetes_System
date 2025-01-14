{{--@extends('layouts.layout_doctor')--}}

{{--@section('title', 'Мои пациенты')--}}

{{--@section('content')--}}
{{--    <h1>Список моих пациентов</h1>--}}

{{--    @if(session('status'))--}}
{{--        <div class="alert alert-success">{{ session('status') }}</div>--}}
{{--    @elseif(session('error'))--}}
{{--        <div class="alert alert-danger">{{ session('error') }}</div>--}}
{{--    @endif--}}

{{--    привязка пациентов--}}
{{--    <form method="POST" action="{{ route('doctor.patients.attach') }}" style="margin-bottom: 1rem;">--}}
{{--        @csrf--}}
{{--        <input type="text" name="pesel" placeholder="PESEL пациента" required maxlength="11" minlength="11">--}}
{{--        <button type="submit" class="btn btn-primary">Привязать пациента</button>--}}
{{--    </form>--}}

{{--    <!-- Форма поиска -->--}}
{{--    <form method="GET" action="{{ route('doctor.patients') }}" style="margin-bottom: 1rem;">--}}
{{--        <input type="text" name="search" placeholder="Поиск по имени, фамилии или PESEL" value="{{ old('search', $search) }}">--}}
{{--        <button type="submit" class="btn btn-primary">Поиск</button>--}}
{{--    </form>--}}

{{--    <!-- Ссылка для показа последних 8 пациентов -->--}}
{{--    <a href="#"--}}
{{--       onclick="event.preventDefault(); document.getElementById('show-last-form').submit();"--}}
{{--       class="btn btn-primary"--}}
{{--    >--}}
{{--        Показать последних пациентов--}}
{{--    </a>--}}

{{--    <!-- Скрытая форма для показа последних пациентов -->--}}
{{--    <form id="show-last-form" method="GET" action="{{ route('doctor.patients') }}" style="display: none;">--}}
{{--        <input type="hidden" name="show_last" value="1">--}}
{{--        @csrf--}}
{{--    </form>--}}

{{--    @if(isset($showTable) && $showTable)--}}
{{--        @if($patients && $patients->count())--}}
{{--            <table class="patients-table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Имя</th>--}}
{{--                    <th>Фамилия</th>--}}
{{--                    <th>Email</th>--}}
{{--                    <th>PESEL</th>--}}
{{--                    <th>Дата рождения</th>--}}
{{--                    <th>Пол</th>--}}
{{--                    <th>Действия</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($patients as $patient)--}}
{{--                    <tr>--}}
{{--                            <td>{{ $patient->user->first_name }}</td>--}}
{{--                            <td>{{ $patient->user->last_name }}</td>--}}
{{--                            <td>{{ $patient->user->email }}</td>--}}
{{--                            <td>{{ $patient->user->pesel }}</td>--}}
{{--                            <td>{{ $patient->birth_date }}</td>--}}
{{--                            <td>{{ $patient->gender }}</td>--}}
{{--                        <td>--}}
{{--                            <div class="action-row">--}}
{{--                                <!-- Верхний ряд: создание плана лечения и отвязка -->--}}
{{--                                <a href="{{ route('doctor.treatment_plan.create', $patient->id) }}"--}}
{{--                                   class="btn action-btn btn-primary btn-sm"--}}
{{--                                   title="Создать план лечения">--}}
{{--                                    📋 Создать план лечения--}}
{{--                                </a>--}}

{{--                                <a href="#"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                    if(confirm('Вы уверены, что хотите отвязать пациента?')) {--}}
{{--                        document.getElementById('detach-form-{{ $patient->id }}').submit();--}}
{{--                    }"--}}
{{--                                   class="btn action-btn btn-danger btn-sm"--}}
{{--                                   title="Отвязать">--}}
{{--                                    🗑️ Отвязать--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div class="action-row">--}}
{{--                                <!-- Нижний ряд: просмотр планов лечения и просмотр данных о здоровье -->--}}
{{--                                <a href="{{ route('doctor.patients.treatment_plans', $patient->id) }}"--}}
{{--                                   class="btn action-btn btn-secondary btn-sm"--}}
{{--                                   title="Просмотреть планы лечения">--}}
{{--                                    📄 Просмотреть планы--}}
{{--                                </a>--}}

{{--                                <a href="{{ route('doctor.patients.glucose', $patient->id) }}"--}}
{{--                                   class="btn action-btn btn-secondary btn-sm"--}}
{{--                                   title="Просмотреть данные о здоровье">--}}
{{--                                    💉 Просмотреть данные--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <!-- Скрытая форма для отвязки пациента -->--}}
{{--                            <form id="detach-form-{{ $patient->id }}" action="{{ route('doctor.patients.detach', $patient->id) }}" method="POST" style="display: none;">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}

{{--            {{ $patients->links() }}--}}
{{--        @else--}}
{{--            <p>Нет пациентов.</p>--}}
{{--        @endif--}}
{{--    @endif--}}
{{--@endsection--}}








@extends('layouts.layout_doctor')

@section('title', 'My Patients')

@section('content')
    <h1>My Patient List</h1>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Attach Patient --}}
    <form method="POST" action="{{ route('doctor.patients.attach') }}" style="margin-bottom: 1rem;">
        @csrf
        <input type="text" name="pesel" placeholder="Patient's PESEL" required maxlength="11" minlength="11">
        <button type="submit" class="btn btn-primary">Attach Patient</button>
    </form>

    <!-- Search Form -->
    <form method="GET" action="{{ route('doctor.patients') }}" style="margin-bottom: 1rem;">
        <input type="text" name="search" placeholder="Search by first name, last name, or PESEL" value="{{ old('search', $search) }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Link to Show Last 8 Patients -->
    <a href="#"
       onclick="event.preventDefault(); document.getElementById('show-last-form').submit();"
       class="btn btn-primary"
    >
        Show Recent Patients
    </a>

    <!-- Hidden Form to Show Last Patients -->
    <form id="show-last-form" method="GET" action="{{ route('doctor.patients') }}" style="display: none;">
        <input type="hidden" name="show_last" value="1">
        @csrf
    </form>

    @if(isset($showTable) && $showTable)
        @if($patients && $patients->count())
            <table class="patients-table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>PESEL</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->user->first_name }}</td>
                        <td>{{ $patient->user->last_name }}</td>
                        <td>{{ $patient->user->email }}</td>
                        <td>{{ $patient->user->pesel }}</td>
                        <td>{{ $patient->birth_date }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>
                            <div class="action-row">
                                <!-- Top row: create treatment plan and detach -->
                                <a href="{{ route('doctor.treatment_plan.create', $patient->id) }}"
                                   class="btn action-btn btn-primary btn-sm"
                                   title="Create Treatment Plan">
                                    📋 Create Treatment Plan
                                </a>

                                <a href="#"
                                   onclick="event.preventDefault();
                                   if(confirm('Are you sure you want to detach this patient?')) {
                                       document.getElementById('detach-form-{{ $patient->id }}').submit();
                                   }"
                                   class="btn action-btn btn-danger btn-sm"
                                   title="Detach">
                                    🗑️ Detach
                                </a>
                            </div>

                            <div class="action-row">
                                <!-- Bottom row: view treatment plans and health data -->
                                <a href="{{ route('doctor.patients.treatment_plans', $patient->id) }}"
                                   class="btn action-btn btn-secondary btn-sm"
                                   title="View Treatment Plans">
                                    📄 View Plans
                                </a>

                                <a href="{{ route('doctor.patients.glucose', $patient->id) }}"
                                   class="btn action-btn btn-secondary btn-sm"
                                   title="View Health Data">
                                    💉 View Data
                                </a>
                            </div>

                            <!-- Hidden form to detach patient -->
                            <form id="detach-form-{{ $patient->id }}" action="{{ route('doctor.patients.detach', $patient->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $patients->links() }}
        @else
            <p>No patients found.</p>
        @endif
    @endif
@endsection
