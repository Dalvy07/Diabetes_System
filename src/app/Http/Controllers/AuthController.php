<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'pesel'        => 'required|string|size:11|unique:users,pesel',
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
            'role'  => 'doctor',  // если используете
            'first_name'   => $validated['first_name'],
            'last_name'    => $validated['last_name'],
            'pesel'        => $validated['pesel'],
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

//        // 4. Авторизуем через session
//        Auth::login($user);
//
//        // 5. Редирект на какую-нибудь страницу врача
//        return redirect()->route('doctor.home');

        // 4. Логин
        Auth::login($user);

        // 5. Отправляем письмо для подтверждения email
        $user->sendEmailVerificationNotification();

        // 6. Перенаправляем на страницу уведомления
//        return redirect()->route('verification.notice')->with('status', 'Проверьте ваш email для подтверждения.');
        return redirect()->route('verification.notice')->with('status', 'Check your email for confirmation.');

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
            'birth_date'  => 'required|date|before_or_equal:today',
            'gender'      => 'required|in:male,female,other',
            // Новое поле
            'diagnosis_date'  => 'nullable|date|before_or_equal:today',
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'pesel'        => 'required|string|size:11|unique:users,pesel',
        ]);

        // 2. Создаём запись в `users`
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'  => 'patient',  // если используете
            'first_name'   => $validated['first_name'],
            'last_name'    => $validated['last_name'],
            'pesel'        => $validated['pesel'],
        ]);

        // 3. Создаём запись в `patients`
        $patient = Patient::create([
            'user_id'    => $user->id,
            'birth_date' => $validated['birth_date'],
            'gender'     => $validated['gender'],
        ]);

        $diagnosisDate = $validated['diagnosis_date'] ?? null;

        // Сразу создаём HealthData для пациента
        $healthData = $patient->healthData()->create([
            'creation_datetime' => now(),
            'diagnosis_date'    => $diagnosisDate,    // или нужная дата
            // Добавьте другие поля при необходимости
        ]);

        // 4. Логин
        Auth::login($user);

        // 5. Отправляем письмо для подтверждения email
        $user->sendEmailVerificationNotification();

        // 6. Перенаправляем на страницу уведомления
//        return redirect()->route('verification.notice')->with('status', 'Проверьте ваш email для подтверждения.');
        return redirect()->route('verification.notice')->with('status', 'Check your email for confirmation.');

    }

    // Показ формы запроса ссылки для сброса пароля
    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    // Отправка ссылки для сброса пароля
    public function sendResetLinkEmail(Request $request)
    {
        // Валидация email
        $request->validate(['email' => 'required|email']);

        // Попытка отправки ссылки для сброса
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Возвращаем статус
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // Показ формы для сброса пароля
    public function showResetPasswordForm(Request $request, $token = null)
    {
        return view('auth.reset_password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                $user->forceFill(['remember_token' => null])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login.form')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


    public function showVerificationNotice()
    {
        return view('auth.verify_email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill(); // Помечает email как подтверждённый

//        return redirect()->route('dashboard')->with('status', 'Ваш email успешно подтверждён!');

        $user = Auth::user();

        if ($user->doctor) {
            // Это доктор
//            return redirect()->route('doctor.dashboard')->with('status', 'Ваш email успешно подтверждён!');
            return redirect()->route('doctor.dashboard')->with('status', 'Your email has been successfully verified!');

        } elseif ($user->patient) {
            // Это пациент
//            return redirect()->route('patient.dashboard')->with('status', 'Ваш email успешно подтверждён!');
            return redirect()->route('patient.dashboard')->with('status', 'Your email has been successfully verified!');

        } else {
            // Возможно, это админ или кто-то ещё
//            return redirect()->route('home')->with('status', 'Ваш email успешно подтверждён!');
            return redirect()->route('home')->with('status', 'Your email has been successfully verified!');

        }
    }

    public function resendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
//            return redirect()->route('dashboard')->with('status', 'Ваш email уже подтверждён.');

            $user = Auth::user();

            if ($user->doctor) {
                // Это доктор
//                return redirect()->route('doctor.home')->with('status', 'Ваш email уже подтверждён.');
                return redirect()->route('doctor.home')->with('status', 'Your email has already been verified.');

            } elseif ($user->patient) {
                // Это пациент
//                return redirect()->route('patient.home')->with('status', 'Ваш email уже подтверждён.');
                return redirect()->route('patient.home')->with('status', 'Your email has already been verified.');

            } else {
                // Возможно, это админ или кто-то ещё
//                return redirect()->route('home')->with('status', 'Ваш email уже подтверждён.');
                return redirect()->route('home')->with('status', 'Your email has already been verified.');

            }
        }

        $request->user()->sendEmailVerificationNotification();

//        return back()->with('status', 'Ссылка для подтверждения отправлена!');
        return back()->with('status', 'Confirmation link sent!');

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

        // 2. Проверяем, была ли установлена галочка "Запомнить меня"
        $remember = $request->filled('remember');

        // 3. Попытка логина с учётом флажка "Запомнить меня"
        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors(['email' => 'Неверные данные']);
        }

        // 4. При успешном логине регенерируем сессию
        $request->session()->regenerate(); // Это помогает предотвратить атаки фиксации сессии

        // 5. Получаем текущего пользователя
        $user = Auth::user();

        // 6. Перенаправляем пользователя в зависимости от его роли
        if ($user->doctor) {
            // Это доктор
            return redirect()->route('doctor.dashboard');
        } elseif ($user->patient) {
            // Это пациент
            return redirect()->route('patient.dashboard');
        } else {
            // Возможно, это админ или кто-то ещё
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        $user = Auth::user(); // Получаем текущего пользователя

        // Удаляем токен "Запомнить меня" из базы данных
        if ($user) {
            $user->forceFill(['remember_token' => null])->save(); // Очистка токена "Запомнить меня"
        }

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user(); // Получаем текущего пользователя

        // Если пользователь связан с доктором, удаляем запись доктора
        if ($user->doctor) {
            $user->doctor()->delete();
        }

        // Если пользователь связан с пациентом, удаляем запись пациента
        if ($user->patient) {
            $user->patient()->delete();
        }

        // Удаляем саму учётную запись пользователя
        $user->delete();

        // Завершаем сессию
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Перенаправляем на главную страницу.
//        return redirect('/')->with('status', 'Ваш аккаунт был успешно удалён.');
        return redirect('/')->with('status', 'Your account has been successfully deleted.');

    }

}
