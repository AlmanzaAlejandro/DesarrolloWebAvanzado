<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendeeDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.asistente'); // Vista del asistente
    }
}
