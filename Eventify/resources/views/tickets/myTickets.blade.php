@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Tus Tickets Comprados</h1>

        @if($userTickets->isEmpty())
            <p>No has comprado tickets aún.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Evento</th>
                    <th>Cantidad de Tickets</th>
                    <th>Precio Total</th>
                    <th>Fecha de Compra</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userTickets as $ticket)
                    <tr>
                        <td>{{ $ticket->event->title }}</td>
                        <td>{{ $ticket->quantity }}</td>
                        <td>${{ number_format($ticket->price * $ticket->quantity, 2) }}</td>
                        <td>{{ $ticket->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
