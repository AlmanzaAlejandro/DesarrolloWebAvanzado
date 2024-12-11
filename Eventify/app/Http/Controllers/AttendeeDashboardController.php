<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;

class AttendeeDashboardController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::latest()->get();
        $userTickets = Ticket::where('user_id', auth()->id())->with('event')->get();
        $search = $request->input('search');

        // Si hay un término de búsqueda, filtrar los eventos
        if ($search) {
            $events = Event::where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->get();
        } else {
            // Si no hay búsqueda, obtener todos los eventos
            $events = Event::all();
        }

        // Pasar los eventos y el término de búsqueda a la vista
        return view('dashboard.attendee.index', compact('events', 'userTickets','search'));
    }
}
