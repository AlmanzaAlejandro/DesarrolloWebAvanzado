<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

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

}


