<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function home()
    {
        // if (!Auth::user()->patient) { ... }

        return view('patient.home');
    }
}
