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
        return redirect()->route('organizer.dashboard');
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

    // Rutas del dashboard del organizador
    Route::prefix('organizer')->name('organizer.')->group(function () {
        // Asegúrate de que la ruta para 'organizer.dashboard' esté bien configurada
        Route::get('/dashboard', [OrganizerDashboardController::class, 'index'])->name('index');
        Route::get('/create', [OrganizerDashboardController::class, 'create'])->name('create');
        Route::post('/', [OrganizerDashboardController::class, 'store'])->name('store');
        Route::get('/{event}/edit', [OrganizerDashboardController::class, 'edit'])->name('edit');
        Route::put('/{event}', [OrganizerDashboardController::class, 'update'])->name('update');
        Route::delete('/{event}', [OrganizerDashboardController::class, 'destroy'])->name('destroy');
    });

    // Rutas del dashboard del asistente
    Route::prefix('asistente')->name('asistente.')->group(function () {
        Route::get('/dashboard', [AttendeeDashboardController::class, 'index'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
