<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function dashboard()
    {
        // if (!Auth::user()->patient) { ... }

        return view('patient.patient_dashboard');
    }
}
