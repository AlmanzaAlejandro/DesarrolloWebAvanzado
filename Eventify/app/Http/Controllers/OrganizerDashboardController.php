<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.organizador'); // Vista del organizador
    }
}
