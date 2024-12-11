<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Carbon\Carbon;
use App\Models\Comment;

class TicketController extends Controller
{
    /**
     * Muestra la página de compra de tickets.
     */
    public function purchase($eventId)
    {
        // Busca el evento según el ID
        $event = Event::findOrFail($eventId);

        // Muestra la vista de compra de tickets
        return view('tickets.purchase', compact('event'));
    }

    /**
     * Realiza la compra de los tickets.
     */
    public function buy(Request $request, $eventId)
    {
        // Validar los datos
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Buscar el evento
        $event = Event::findOrFail($eventId);

        // Obtener el usuario autenticado (suponiendo que usas autenticación)
        $user = auth()->user();

        // Registrar los tickets en la base de datos
        $tickets = [];
        for ($i = 0; $i < $request->quantity; $i++) {
            $tickets[] = new Ticket([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'price' => $event->price,
            ]);
        }

        // Guardar los tickets en la base de datos
        $user->tickets()->saveMany($tickets);

        // Redirigir al usuario a una página de confirmación o la lista de eventos
        return redirect()->route('attendee.index')->with('success', 'Compra realizada con éxito');
    }

    public function myTickets()
    {
        // Obtener los tickets del usuario autenticado
        $userTickets = auth()->user()->tickets()->with('event')->get(); // Asegúrate de cargar el evento relacionado

        // Retorna la vista con los tickets
        return view('tickets.myTickets', compact('userTickets'));
    }

    public function myEvents()
    {
        $user = auth()->user();

        // Obtener los tickets del usuario
        $tickets = $user->tickets()->with('event')->get();

        // Filtrar los eventos pasados y futuros
        $upcomingEvents = $tickets->filter(function ($ticket) {
            return Carbon::parse($ticket->event->event_date)->isFuture();
        });

        $pastEvents = $tickets->filter(function ($ticket) {
            return Carbon::parse($ticket->event->event_date)->isPast();
        });

        // Eliminar duplicados basados en el ID del evento
        $upcomingEvents = $upcomingEvents->unique(function ($ticket) {
            return $ticket->event->id;
        });

        $pastEvents = $pastEvents->unique(function ($ticket) {
            return $ticket->event->id;
        });

        // Ordenar los eventos por fecha
        $upcomingEvents = $upcomingEvents->sortBy(function ($ticket) {
            return Carbon::parse($ticket->event->event_date);
        });

        $pastEvents = $pastEvents->sortByDesc(function ($ticket) {
            return Carbon::parse($ticket->event->event_date);
        });

        // Devolver la vista con los eventos pasados y futuros
        return view('tickets.myEvents', compact('upcomingEvents', 'pastEvents'));
    }

    public function addComment(Request $request, $eventId)
    {
        // Validar el contenido del comentario
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        // Obtener el evento
        $event = Event::findOrFail($eventId);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Crear un nuevo comentario
        Comment::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'content' => $request->comment,
        ]);

        return redirect()->route('tickets.myEvents')->with('success', 'Comentario agregado con éxito.');
    }

}


