<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Dashboard - Asistente de Eventos') }}
    </h2>
</x-slot>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lista de Eventos</h1>

        <!-- Barra de búsqueda -->
        <form method="GET" action="{{ route('attendee.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar eventos..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        @if($events->isEmpty())
            <p>No se encontraron eventos.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha del Evento</th>
                    <th>Ubicación</th>
                    <th>Precio del Ticket</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->location }}</td>
                        <td>${{ number_format($event->price, 2) }}</td>
                        <td>
                            <!-- Botón para comprar tickets -->
                            <a href="{{ route('tickets.purchase', $event->id) }}" class="btn btn-success">Comprar Tickets</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <h2 class="mt-5">Tus Tickets Comprados</h2>

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
