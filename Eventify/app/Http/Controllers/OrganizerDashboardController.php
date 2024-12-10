<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class OrganizerDashboardController extends Controller
{
    // Muestra todos los eventos
    public function index()
    {
        $events = Event::all(); // Obtener todos los eventos
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
        ]);

        // Crear el evento
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('organizer.index')->with('success', 'Evento creado exitosamente.');
    }

    // Muestra el formulario para editar un evento existente
    public function edit(Event $event)
    {
        return view('dashboard.organizer.edit', compact('event'));
    }

    // Actualiza un evento existente
    public function update(Request $request, Event $event)
    {
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
        $event->delete(); // Eliminar el evento

        // Redirigir con mensaje de éxito
        return redirect()->route('organizer.index')->with('success', 'Evento eliminado exitosamente.');
    }
}
