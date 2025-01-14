<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\TreatmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function dashboard() {
        return view('doctor.doctor_dashboard');
    }

    public function profile() {
        $doctor = Auth::user()->doctor;
        $user = Auth::user();
        return view('doctor.profile.show', compact('user', 'doctor'));
    }

    public function editProfile() {
        $doctor = Auth::user()->doctor;
        $user = Auth::user();
        return view('doctor.profile.edit', compact('user', 'doctor'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $doctor = $user->doctor;

        // Валидация входных данных, аналогично регистрации, с уникальностью для текущего пользователя
        $validated = $request->validate([
            'name'             => 'required|string|max:255|unique:users,name,' . $user->id,
            'email'            => 'required|email|unique:users,email,' . $user->id,
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'pesel'            => 'required|string|size:11|unique:users,pesel,' . $user->id,
            'specializations'  => 'required|string',
            'certificates'     => 'nullable|string',
            'work_hours'       => 'nullable|string',
            'is_available'     => 'nullable|boolean',
        ]);

        // Обновляем данные в таблице users
        $user->update([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'pesel'      => $validated['pesel'],
        ]);

        // Обработка строк специальных полей в массивы
        $specializations = explode(',', $validated['specializations']);
        $certificates = !empty($validated['certificates'])
            ? explode(',', $validated['certificates'])
            : [];

        // Обновление данных в таблице doctors
        $doctor->update([
            'specializations' => $specializations,
            'certificates'    => $certificates,
            'work_hours'      => $validated['work_hours'] ?? null,
            'is_available'    => !empty($validated['is_available']),
        ]);

//        return redirect()->route('doctor.profile')
//            ->with('status', 'Профиль успешно обновлён!');
        return redirect()->route('doctor.profile')
            ->with('status', 'Profile successfully updated!');
    }

//    public function patients(Request $request) {
//        $doctor = Auth::user()->doctor;
//
//        // Начинаем построение запроса с JOIN таблиц patients и users
//        $query = $doctor->patients()
//            ->join('users', 'patients.user_id', '=', 'users.id')
//            ->orderBy('users.last_name')
//            ->select('patients.*');  // выбираем поля пациентов, но для сортировки используем данные из users
//
//        // Получаем параметры поиска из запроса
//        $search = $request->input('search');
//
//        if ($search) {
//            $query->where(function($q) use ($search) {
//                $q->where('users.first_name', 'like', "%{$search}%")
//                    ->orWhere('users.last_name', 'like', "%{$search}%")
//                    ->orWhere('users.pesel', 'like', "%{$search}%");
//            });
//        }
//
//        $patients = $query->paginate(10)->appends($request->all());
//
//        return view('doctor.patients.index', compact('patients', 'search'));
//    }

//Переменная $showTable определяет, нужно ли показывать таблицу. Таблица отображается, если был произведен
//поиск ($search) или был указан параметр show_last (при нажатии на кнопку «Показать последних 8 пациентов»).
    public function patients(Request $request) {
        $doctor = Auth::user()->doctor;
        $query = $doctor->patients()
            ->join('users', 'patients.user_id', '=', 'users.id')
            ->orderBy('users.last_name')
            ->select('patients.*');

        $search = $request->input('search');
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('users.first_name', 'like', "%{$search}%")
                    ->orWhere('users.last_name', 'like', "%{$search}%")
                    ->orWhere('users.pesel', 'like', "%{$search}%");
            });
        }

        // Проверяем, нужно ли показать таблицу пациентов
        $showTable = $request->has('show_last') || $search;

        // Если таблицу показывать нужно, применяем пагинацию
        $patients = $showTable ? $query->paginate(8)->appends($request->all()) : null;

        return view('doctor.patients.index', compact('patients', 'search', 'showTable'));
    }

    public function attachPatient(Request $request) {
        $doctor = Auth::user()->doctor;
        $validated = $request->validate([
            'pesel' => 'required|string|size:11',
        ]);

        $pesel = $validated['pesel'];

        // Ищем пациента по PESEL, используя связь с User
        $patient = Patient::whereHas('user', function($query) use ($pesel) {
            $query->where('pesel', $pesel);
        })
            ->whereDoesntHave('doctors', function($query) use ($doctor) {
                $query->where('doctor_id', $doctor->id);
            })
            ->first();

        if (!$patient) {
//            return redirect()->route('doctor.patients')
//                ->with('error', 'Пациент не найден или уже привязан к этому доктору.');
            return redirect()->route('doctor.patients')
                ->with('error', 'Patient not found or already attached to this doctor.');
        }

        $doctor->patients()->attach($patient->id);

//        return redirect()->route('doctor.patients', ['show_last' => 1])
//            ->with('status', 'Пациент успешно привязан.');
        return redirect()->route('doctor.patients', ['show_last' => 1])
            ->with('status', 'The patient is successfully tethered.');
    }

    public function detachPatient(Patient $patient) {
        $doctor = Auth::user()->doctor;

        if (!$doctor->patients()->find($patient->id)) {
//            return redirect()->route('doctor.patients')
//                ->with('error', 'Вы не привязаны к этому пациенту.');
            return redirect()->route('doctor.patients')
                ->with('error', 'You`re not attached to this patient.');
        }

        $doctor->patients()->detach($patient->id);

//        return redirect()->route('doctor.patients')
//            ->with('status', 'Пациент успешно отвязан.');
        return redirect()->route('doctor.patients')
            ->with('status', 'The patient has been successfully weaned.');
    }

    public function viewPatient(Patient $patient) {
        // Опционально: проверка, связан ли пациент с текущим доктором
        return view('doctor.patients.view', compact('patient'));
    }

    public function createTreatmentPlan($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        // Опционально: проверка, что текущий доктор имеет право создавать план для этого пациента

        return view('doctor.patients.treatment_plan.create', compact('patient'));
    }

    public function storeTreatmentPlan(Request $request, $patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $doctor = Auth::user()->doctor;

        $validated = $request->validate([
            'diet_recommendations'     => 'nullable|string',
            'activity_recommendations' => 'nullable|string',
            'medication_plan'          => 'nullable|string',
            'glucose_target'           => 'nullable|numeric',
            'weight_target'            => 'nullable|numeric',
            'note'                     => 'nullable|string',
            // Добавьте другие правила валидации, если нужно
        ]);

        // Создание плана лечения с заполнением полей
        TreatmentPlan::create([
            'patient_id'              => $patient->id,
            'doctor_id'               => $doctor->id,
            'creation_date'           => now(),
            'last_updated'            => now(),
            'status'                  => 'active',
            'diet_recommendations'    => $validated['diet_recommendations'] ?? null,
            'activity_recommendations'=> $validated['activity_recommendations'] ?? null,
            'medication_plan'         => isset($validated['medication_plan']) ? json_encode($validated['medication_plan']) : null,
            'glucose_target'          => $validated['glucose_target'] ?? null,
            'weight_target'           => $validated['weight_target'] ?? null,
            'note'                    => $validated['note'] ?? null,
        ]);

//        return redirect()->route('doctor.patients.treatment_plans', $patient->id)
//            ->with('status', 'План лечения успешно создан!');
        return redirect()->route('doctor.patients.treatment_plans', $patient->id)
            ->with('status', 'A treatment plan has been successfully created!');
    }


    // Метод для просмотра планов лечения пациента
    public function viewTreatmentPlans(Patient $patient)
    {
        // При необходимости добавьте проверку, связан ли пациент с текущим доктором

        // Получаем планы лечения для данного пациента
        $treatmentPlans = TreatmentPlan::where('patient_id', $patient->id)->get();

        return view('doctor.patients.treatment_plans', compact('patient', 'treatmentPlans'));
    }

    // Метод для просмотра медицинских данных пациента
    public function viewGlucoseMeasurements(Patient $patient)
    {
        // Проверяем наличие связанного HealthData
        $glucoseMeasurements = collect();
        if ($patient->healthData) {
            $glucoseMeasurements = $patient->healthData->glucoseMeasurements()
                ->orderByDesc('measurement_datetime')
                ->paginate(10);
        }

        return view('doctor.patients.glucose', compact('patient', 'glucoseMeasurements'));
    }

    // Просмотр деталей плана лечения
    public function viewTreatmentPlan(TreatmentPlan $plan)
    {
        // При необходимости проверяйте, что текущий доктор имеет доступ к этому плану
        return view('doctor.patients.treatment_plan.view', compact('plan'));
    }

    // Форма редактирования плана лечения
    public function editTreatmentPlan(TreatmentPlan $plan)
    {
        // Проверьте доступ доктора к плану, если нужно
        return view('doctor.patients.treatment_plan.edit', compact('plan'));
    }

    // Обновление плана лечения
//    public function updateTreatmentPlan(Request $request, TreatmentPlan $plan)
//    {
//        $validated = $request->validate([
//            'status'                   => 'required|string', // добавлено
//            'diet_recommendations'     => 'nullable|string',
//            'activity_recommendations' => 'nullable|string',
//            'medication_plan'          => 'nullable|string',
//            'glucose_target'           => 'nullable|numeric',
//            'weight_target'            => 'nullable|numeric',
//            'note'                     => 'nullable|string',
//            // Добавьте другие правила валидации по необходимости
//        ]);
//
//        $plan->update([
//            'status'                   => $validated['status'],
//            'diet_recommendations'     => $validated['diet_recommendations'] ?? $plan->diet_recommendations,
//            'activity_recommendations' => $validated['activity_recommendations'] ?? $plan->activity_recommendations,
//            'medication_plan'          => $validated['medication_plan'] ?? $plan->medication_plan,
//            'glucose_target'           => $validated['glucose_target'] ?? $plan->glucose_target,
//            'weight_target'            => $validated['weight_target'] ?? $plan->weight_target,
//            'note'                     => $validated['note'] ?? $plan->note,
//            'last_updated'             => now(),
//            // Обновите другие поля, если необходимо
//        ]);
//
//        return redirect()->route('doctor.treatment_plan.view', $plan->id)
//            ->with('status', 'План лечения успешно обновлён!');
//    }
    public function updateTreatmentPlan(Request $request, TreatmentPlan $plan)
    {
        $validated = $request->validate([
            'status'                   => 'required|string|in:active,completed,pending', // статус ограничен допустимыми значениями
            'diet_recommendations'     => 'nullable|string|max:1000',
            'activity_recommendations' => 'nullable|string|max:1000',
            'medication_plan'          => 'nullable|string|max:1000',
            'glucose_target'           => 'nullable|numeric|min:0|max:50',  // Уровень глюкозы не может быть отрицательным
            'weight_target'            => 'nullable|numeric|min:0|max:500', // Цель по весу в адекватных пределах
            'note'                     => 'nullable|string|max:2000',
            'specializations'          => 'nullable|array',  // Новое поле
            'specializations.*'        => 'string|max:255',
            'certificates'             => 'nullable|array',  // Новое поле
            'certificates.*'           => 'string|max:255',
            'work_hours'               => 'nullable|string|max:255',
            'is_available'             => 'nullable|boolean',
        ]);

        // Обновляем план лечения
        $plan->update([
            'status'                   => $validated['status'],
            'diet_recommendations'     => $validated['diet_recommendations'] ?? $plan->diet_recommendations,
            'activity_recommendations' => $validated['activity_recommendations'] ?? $plan->activity_recommendations,
            'medication_plan'          => $validated['medication_plan'] ?? $plan->medication_plan,
            'glucose_target'           => $validated['glucose_target'] ?? $plan->glucose_target,
            'weight_target'            => $validated['weight_target'] ?? $plan->weight_target,
            'note'                     => $validated['note'] ?? $plan->note,
            'last_updated'             => now(),
        ]);

        // Если обновляются данные доктора
        if ($request->hasAny(['specializations', 'certificates', 'work_hours', 'is_available'])) {
            $doctor = $plan->doctor;

            $doctor->update([
                'specializations' => $validated['specializations'] ?? $doctor->specializations,
                'certificates'    => $validated['certificates'] ?? $doctor->certificates,
                'work_hours'      => $validated['work_hours'] ?? $doctor->work_hours,
                'is_available'    => $validated['is_available'] ?? $doctor->is_available,
            ]);
        }

        return redirect()->route('doctor.treatment_plan.view', $plan->id)
            ->with('status', 'Treatment plan has been successfully updated!');
    }


    public function destroyTreatmentPlan(TreatmentPlan $plan)
    {
        // Сохраняем ID пациента до удаления плана
        $patientId = $plan->patient_id;

        // Удаляем план лечения
        $plan->delete();

        // Перенаправляем на страницу с планами лечения для того же пациента
//        return redirect()->route('doctor.patients.treatment_plans', $patientId)
//            ->with('status', 'План лечения успешно удалён!');
        return redirect()->route('doctor.patients.treatment_plans', $patientId)
            ->with('status', 'The treatment plan has been successfully removed!');
    }
}
