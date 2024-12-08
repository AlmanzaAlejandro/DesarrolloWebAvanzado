<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Http\Controllers\OrganizerDashboardController;
use App\Http\Controllers\AttendeeDashboardController;

Route::get('/', function () {
    $events = Event::latest()->take(5)->get(); // Los últimos 5 eventos

    return view('welcome', compact('events'));
});

// Ruta principal del dashboard
Route::get('/dashboard', function () {
    $user = auth()->user();

    // Redirigir según el rol del usuario autenticado
    if ($user->role === 'organizador') {
        return redirect()->route('organizador.dashboard');
    } elseif ($user->role === 'asistente') {
        return redirect()->route('asistente.dashboard');
    }

    // Redirigir a una página de error o predeterminada si el rol no es válido
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard del organizador
    Route::get('/organizador/dashboard', [OrganizerDashboardController::class, 'index'])
        ->name('organizador.dashboard');

    // Dashboard del asistente
    Route::get('/asistente/dashboard', [AttendeeDashboardController::class, 'index'])
        ->name('asistente.dashboard');
});

require __DIR__.'/auth.php';
