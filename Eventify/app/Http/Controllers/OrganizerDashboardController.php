<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class OrganizerDashboardController extends Controller
{
    // Muestra todos los eventos del usuario logeado
    public function index()
    {
        $events = Event::where('user_id', Auth::id())->get(); // Obtener solo los eventos del usuario logeado
        return view('dashboard.organizer.index', compact('events'));
    }

    // Muestra el formulario para crear un nuevo evento
    public function create()
    {
        return view('dashboard.organizer.create');
    }

    // Almacena un nuevo evento en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public'); // Almacena la imagen en storage/app/public/events
        }

        // Crear el evento asociándolo al usuario logeado
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'user_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('organizer.index')->with('success', 'Evento creado exitosamente.');
    }

    // Muestra el formulario para editar un evento existente
    public function edit(Event $event)
    {
        // Verificar que el evento pertenece al usuario logeado
        if ($event->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este evento.');
        }

        return view('dashboard.organizer.edit', compact('event'));
    }

    // Actualiza un evento existente
    public function update(Request $request, Event $event)
    {
        // Verificar que el evento pertenece al usuario logeado
        if ($event->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este evento.');
        }

        // Validación de los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Actualizar el evento
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('organizer.index')->with('success', 'Evento actualizado exitosamente.');
    }

    // Elimina un evento
    public function destroy(Event $event)
    {
        // Verificar que el evento pertenece al usuario logeado
        if ($event->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este evento.');
        }

        $event->delete(); // Eliminar el evento

        // Redirigir con mensaje de éxito
        return redirect()->route('organizer.index')->with('success', 'Evento eliminado exitosamente.');
    }
}
