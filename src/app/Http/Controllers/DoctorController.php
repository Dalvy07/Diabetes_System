<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function dashboard()
    {
        // Можно какие-то проверки
        // if (!Auth::user()->doctor) { ... }

        return view('doctor.doctor_dashboard');
    }
}
