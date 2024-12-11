<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class TicketController extends Controller
{
    /**
     * Muestra la página de compra de tickets.
     */
    public function purchase($eventId)
    {
        // Busca el evento según el ID (opcional si necesitas información del evento)
        $event = Event::findOrFail($eventId);

        // Por ahora, muestra un mensaje estático
        return view('tickets.purchase', compact('event'));
    }
}
