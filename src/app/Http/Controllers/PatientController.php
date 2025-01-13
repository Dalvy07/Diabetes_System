<?php

namespace App\Http\Controllers;

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
            // Добавьте другие поля, если необходимо
        ]);

        // Обновление данных в таблице users
        $user->update([
            'name'  => $validated['name'],
            'email' => $validated['email'],
            // Пароль обновлять отдельной логикой, если требуется
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
}
