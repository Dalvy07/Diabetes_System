<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

// Registration
Route::get('/register/doctor',  [AuthController::class, 'showDoctorRegisterForm'])->name('doctor.register.form');
Route::post('/register/doctor', [AuthController::class, 'registerDoctor'])->name('doctor.register');

Route::get('/register/patient',  [AuthController::class, 'showPatientRegisterForm'])->name('patient.register.form');
Route::post('/register/patient', [AuthController::class, 'registerPatient'])->name('patient.register');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware('auth')->group(function () {

    // Домашняя страница доктора
    Route::get('/doctor/home', [DoctorController::class, 'home'])
        ->name('doctor.home');

    // Домашняя страница пациента
    Route::get('/patient/home', [PatientController::class, 'home'])
        ->name('patient.home');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
