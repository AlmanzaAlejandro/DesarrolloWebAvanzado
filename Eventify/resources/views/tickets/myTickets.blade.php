@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen">
        <div class="container mx-auto py-8 px-4">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Tickets Comprados</h1>

            <!-- Botón para regresar a la página anterior -->
            <div class="mb-6">
                <a href="javascript:history.back()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow transition">
                    Regresar
                </a>
            </div>

            @if($userTickets->isEmpty())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-6">
                    <p>No has comprado tickets aún.</p>
                </div>
            @else
                <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="p-4 text-left">Evento</th>
                            <th class="p-4 text-left">Cantidad de Tickets</th>
                            <th class="p-4 text-left">Precio Total</th>
                            <th class="p-4 text-left">Fecha de Compra</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userTickets as $ticket)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="border-t p-4">{{ $ticket->event->title }}</td>
                                <td class="border-t p-4">{{ $ticket->quantity }}</td>
                                <td class="border-t p-4">${{ number_format($ticket->price * $ticket->quantity, 2) }}</td>
                                <td class="border-t p-4">{{ $ticket->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
