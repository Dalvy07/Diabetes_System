<?php
use App\Http\Controllers\GlucoseController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    // Если пользователь уже залогинен...
    if (Auth::check()) {
        // Если доктор -> перенаправляем на дашборд доктора
        if (Auth::user()->doctor) {
            return redirect()->route('doctor.dashboard');
        }
        // Если пациент -> перенаправляем на дашборд пациента
        elseif (Auth::user()->patient) {
            return redirect()->route('patient.dashboard');
        }
    }

    // Иначе просто отображаем гостевую страницу
    return view('welcome');
})->name('landing');

// Группа маршрутов для гостей
Route::middleware('guest')->group(function () {
    // Главная страница (Landing)

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

// Группа маршрутов для авторизованных пользователей - ОБЯЗАТЕЛЬНО ПОМЕНЯТЬ, БО ВИРИФИЦИРОВАННЫЙ ПАЦИЕНТ СМОЖЕТ ЗАЙТИ К ДОКТОРУ????
Route::middleware('auth')->group(function () {
    // Email verification
    Route::get('/email/verify', [AuthController::class, 'showVerificationNotice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [AuthController::class, 'resendVerificationEmail'])
        ->name('verification.send');

    // Удаление аккаунта
    Route::delete('/account/delete', [AuthController::class, 'deleteAccount'])->name('account.delete');

    // Выход из системы
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Маршруты, требующие верификации email
    Route::middleware('verified')->group(function () {
        Route::prefix('patient')->middleware(CheckRole::class.':patient')->group(function () {
            // Главная страница (Dashboard)
            Route::get('/dashboard', [PatientController::class, 'dashboard'])
                ->name('patient.dashboard');

            // Глюкоза (можно сделать resource, если хочется CRUD)
            Route::get('/glucose', [GlucoseController::class, 'index'])
                ->name('patient.glucose.index');
            Route::get('/glucose/create', [GlucoseController::class, 'create'])
                ->name('patient.glucose.create');
            Route::post('/glucose', [GlucoseController::class, 'store'])
                ->name('patient.glucose.store');
            Route::get('/glucose/{id}/edit', [GlucoseController::class, 'edit'])
                ->name('patient.glucose.edit');
            Route::put('/glucose/{id}', [GlucoseController::class, 'update'])
                ->name('patient.glucose.update');
            Route::delete('/glucose/{id}', [GlucoseController::class, 'destroy'])
                ->name('patient.glucose.destroy');


            // Маршрут для отображения страницы профиля
            Route::get('/profile', [PatientController::class, 'profile'])
                ->name('patient.profile');
            // Маршрут для отображения формы редактирования профиля
            Route::get('/profile/edit', [PatientController::class, 'editProfile'])
                ->name('patient.profile.edit');
            // Маршрут для обновления данных профиля (POST или PUT)
            Route::put('/profile', [PatientController::class, 'updateProfile'])
                ->name('patient.profile.update');


            // Маршруты для просмотра планов лечения пациента
            Route::get('/treatment-plans', [PatientController::class, 'viewTreatmentPlans'])
                ->name('patient.treatment_plan');
            // Маршрут для просмотра полного плана лечения пациента
            Route::get('/treatment-plans/{plan}', [PatientController::class, 'viewTreatmentPlan'])
                ->name('patient.treatment_plan.view');
        });

        Route::prefix('doctor')->middleware(CheckRole::class.':doctor')->group(function () {
            // Главная страница (Dashboard)
            Route::get('/dashboard', [DoctorController::class, 'dashboard'])
                ->name('doctor.dashboard');

            // Профиль доктора
            Route::get('/profile', [DoctorController::class, 'profile'])->name('doctor.profile');
            Route::get('/profile/edit', [DoctorController::class, 'editProfile'])->name('doctor.profile.edit');
            Route::put('/profile', [DoctorController::class, 'updateProfile'])->name('doctor.profile.update');

            // Управление пациентами
            Route::get('/patients', [DoctorController::class, 'patients'])->name('doctor.patients');
            Route::post('/patients/attach', [DoctorController::class, 'attachPatient'])->name('doctor.patients.attach');
            Route::delete('/patients/{patient}/detach', [DoctorController::class, 'detachPatient'])->name('doctor.patients.detach');

            // Просмотр пациента
            Route::get('/patients/{patient}', [DoctorController::class, 'viewPatient'])->name('doctor.patients.view');

            // Создание плана лечения для пациента
            Route::get('/patients/{patient}/treatment-plan/create', [DoctorController::class, 'createTreatmentPlan'])
                ->name('doctor.treatment_plan.create');
            Route::post('/patients/{patient}/treatment-plan', [DoctorController::class, 'storeTreatmentPlan'])
                ->name('doctor.treatment_plan.store');

            // Просмотр планов лечения выбранного пациента
            Route::get('/patients/{patient}/treatment-plans', [DoctorController::class, 'viewTreatmentPlans'])
                ->name('doctor.patients.treatment_plans');

            // Просмотр медицинских данных (измерений глюкозы) выбранного пациента
            Route::get('/patients/{patient}/glucose', [DoctorController::class, 'viewGlucoseMeasurements'])
                ->name('doctor.patients.glucose');

            // Просмотр деталей плана лечения
            Route::get('/treatment-plans/{plan}', [DoctorController::class, 'viewTreatmentPlan'])
                ->name('doctor.treatment_plan.view');

            // Форма редактирования плана лечения
            Route::get('/treatment-plans/{plan}/edit', [DoctorController::class, 'editTreatmentPlan'])
                ->name('doctor.treatment_plan.edit');

            // Обновление плана лечения
            Route::put('/treatment-plans/{plan}', [DoctorController::class, 'updateTreatmentPlan'])
                ->name('doctor.treatment_plan.update');

            // Удаление плана лечения
            Route::delete('/treatment-plans/{plan}', [DoctorController::class, 'destroyTreatmentPlan'])
                ->name('doctor.treatment_plan.destroy');
        });
    });
});

