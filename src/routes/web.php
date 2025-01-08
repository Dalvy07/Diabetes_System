<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//})->name('landing');
//
//// Registration
//Route::get('/register/doctor',  [AuthController::class, 'showDoctorRegisterForm'])->name('doctor.register.form');
//Route::post('/register/doctor', [AuthController::class, 'registerDoctor'])->name('doctor.register');
//
//Route::get('/register/patient',  [AuthController::class, 'showPatientRegisterForm'])->name('patient.register.form');
//Route::post('/register/patient', [AuthController::class, 'registerPatient'])->name('patient.register');
//
//// Authentication
//Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
//Route::post('/login', [AuthController::class, 'login'])->name('login');
//
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
//
//// Email verification
//Route::get('/email/verify', [AuthController::class, 'showVerificationNotice'])
//    ->middleware('auth')
//    ->name('verification.notice');
//
//Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
//    ->middleware(['auth', 'signed'])
//    ->name('verification.verify');
//
//Route::middleware('auth')->group(function () {
//
//    // Домашняя страница доктора
//    Route::get('/doctor/home', [DoctorController::class, 'home'])
//        ->name('doctor.home');
//
//    // Домашняя страница пациента
//    Route::get('/patient/home', [PatientController::class, 'home'])
//        ->name('patient.home');
//
//    // Logout
//    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//
//    // Удаление аккаунта
//    Route::delete('/account/delete', [AuthController::class, 'deleteAccount'])->name('account.delete');
//});

// Главная страница
Route::get('/', function () {
//    return view('welcome');
    return view('welcomeV2');
})->name('landing');

// Группа маршрутов для гостей
Route::middleware('guest')->group(function () {
    // Регистрация доктора
    Route::get('/register/doctor', [AuthController::class, 'showDoctorRegisterForm'])->name('doctor.register.form');
    Route::post('/register/doctor', [AuthController::class, 'registerDoctor'])->name('doctor.register');

    // Регистрация пациента
    Route::get('/register/patient', [AuthController::class, 'showPatientRegisterForm'])->name('patient.register.form');
    Route::post('/register/patient', [AuthController::class, 'registerPatient'])->name('patient.register');

    // Вход в систему
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Запрос на сброс пароля
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    // Форма для сброса пароля
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Группа маршрутов для авторизованных пользователей
Route::middleware('auth')->group(function () {
    // Email verification
    Route::get('/email/verify', [AuthController::class, 'showVerificationNotice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware(['signed']) // Проверяет подпись ссылки
        ->name('verification.verify');

    Route::post('/email/verification-notification', [AuthController::class, 'resendVerificationEmail'])
        ->name('verification.send');

    // Защищённые маршруты для подтверждённых пользователей
    Route::middleware('verified')->group(function () {
        // Домашняя страница доктора
        Route::get('/doctor/home', [DoctorController::class, 'home'])->name('doctor.home');

        // Домашняя страница пациента
        Route::get('/patient/home', [PatientController::class, 'home'])->name('patient.home');
    });

    // Удаление аккаунта
    Route::delete('/account/delete', [AuthController::class, 'deleteAccount'])->name('account.delete');

    // Выход из системы
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
