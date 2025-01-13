<?php

namespace App\Http\Controllers;

use App\Models\TreatmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function dashboard()
    {
        // if (!Auth::user()->patient) { ... }

        return view('patient.patient_dashboard');
    }

    public function profile()
    {
        $patient = Auth::user()->patient;
        $user = Auth::user();

        return view('patient.profile.show', compact('user', 'patient'));
    }

    public function editProfile()
    {
        $patient = Auth::user()->patient;
        $user = Auth::user();

        return view('patient.profile.edit', compact('user', 'patient'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $patient = $user->patient;

        // Валидация данных
        $validated = $request->validate([
            'name'       => 'required|string|max:255|unique:users,name,'.$user->id,
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'birth_date' => 'required|date|before_or_equal:today',
            'gender'     => 'required|in:male,female,other',
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'pesel'       => 'required|string|size:11|unique:users,pesel,'.$user->id,
        ]);

        // Обновление данных в таблице users
        $user->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
            // Пароль обновлять отдельной логикой, если требуется
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'pesel'      => $validated['pesel'],
        ]);

        // Обновление данных в таблице patients
        $patient->update([
            'birth_date' => $validated['birth_date'],
            'gender'     => $validated['gender'],
            // Обновите дополнительные поля пациента по необходимости
        ]);

        return redirect()->route('patient.profile')
            ->with('status', 'Профиль успешно обновлён!');
    }

    public function viewTreatmentPlans()
    {
        $patient = Auth::user()->patient;

        // Извлекаем планы лечения текущего пациента, отсортированные по дате создания
        $treatmentPlans = TreatmentPlan::where('patient_id', $patient->id)
            ->orderByDesc('creation_date')
            ->paginate(10);

        return view('patient.treatment_plan.index', compact('treatmentPlans'));
    }

    public function viewTreatmentPlan(TreatmentPlan $plan)
    {
        // Проверить, что план принадлежит текущему пациенту, опционально
        $patient = Auth::user()->patient;
        if ($plan->patient_id !== $patient->id) {
            abort(403, 'Доступ запрещён.');
        }

        return view('patient.treatment_plan.view', compact('plan'));
    }
}
