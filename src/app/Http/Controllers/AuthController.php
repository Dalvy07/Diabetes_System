<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showDoctorRegisterForm()
    {
        return view('auth.register_doctor');
    }

    public function registerDoctor(Request $request)
    {
        // 1. Валидация
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:6|confirmed',
            // Поля для doctor
            'specializations'  => 'required|string', // список через запятую
            'certificates'     => 'nullable|string', // тоже можем парсить как массив
            'work_hours'       => 'nullable|string',
            'is_available'     => 'nullable|boolean',
        ]);

        // 2. Создаём запись в `users`
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'  => 'doctor'  // если используете
        ]);

        // 3. Создаём запись в `doctors`, связав user_id
        $specializations = explode(',', $validated['specializations']);
        $certificates    = !empty($validated['certificates'])
            ? explode(',', $validated['certificates'])
            : [];

        $doctor = Doctor::create([
            'user_id'         => $user->id,
            'specializations' => $specializations,
            'certificates'    => $certificates,
            'work_hours'      => $validated['work_hours'] ?? null,
            'is_available'    => !empty($validated['is_available']),
        ]);

        // 4. Авторизуем через session
        Auth::login($user);

        // 5. Редирект на какую-нибудь страницу врача
        return redirect()->route('doctor.home');
    }

    public function showPatientRegisterForm()
    {
        return view('auth.register_patient');
    }

    // Обработка регистрации пациента
    public function registerPatient(Request $request)
    {
        // 1. Валидация
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:6|confirmed',
            // Поля для patient
            'birth_date'  => 'required|date',
            'gender'      => 'required|in:male,female,other',
        ]);

        // 2. Создаём запись в `users`
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // 3. Создаём запись в `patients`
        $patient = Patient::create([
            'user_id'    => $user->id,
            'birth_date' => $validated['birth_date'],
            'gender'     => $validated['gender'],
        ]);

        // 4. Логин
        Auth::login($user);

        // 5. Редирект
        return redirect()->route('patient.home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Валидируем
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 2. Попытка логина
        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Неверные данные']);
        }

        // 3. При успешном логине получаем User
        $user = Auth::user();

        // 4. Смотрим, есть ли у него doctor или patient
        // (Если вы где-то сохранили $user->role, можно проверить по нему.)
        if ($user->doctor) {
            // Это доктор
            return redirect()->route('doctor.home');
        } elseif ($user->patient) {
            // Это пациент
            return redirect()->route('patient.home');
        } else {
            // Возможно, это админ или кто-то ещё
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
