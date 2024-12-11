<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Dashboard - Asistente de Eventos') }}
    </h2>
</x-slot>

@extends('layouts.app')

@section('content')
    <!-- Botón para ver los tickets comprados -->
    <div class="mt-6 text-center">
        <a href="{{ route('tickets.myTickets') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow transition">
            Mis Tickets Comprados
        </a>
    </div>

    <div class="bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen">
        <div class="container mx-auto py-8 px-4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-extrabold text-gray-800">Eventos Disponibles</h1>
            </div>
            <!-- Barra de búsqueda -->
            <form method="GET" action="{{ route('attendee.index') }}" class="mb-6">
                <div class="flex">
                    <input
                        type="text"
                        name="search"
                        class="w-full rounded-l-lg border-gray-300 focus:ring-blue-400 focus:border-blue-400"
                        placeholder="Buscar eventos..."
                        value="{{ $search ?? '' }}"
                    />
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-r-lg transition"
                    >
                        Buscar
                    </button>
                </div>
            </form>

            @if($events->isEmpty())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-6">
                    <p>No se encontraron eventos.</p>
                </div>
            @else
                <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                    <table class="min-w-full border-collapse bg-white">
                        <thead>
                        <tr class="bg-blue-600 text-white text-left">
                            <th class="p-4">Título</th>
                            <th class="p-4">Descripción</th>
                            <th class="p-4">Fecha</th>
                            <th class="p-4">Ubicación</th>
                            <th class="p-4 text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="border-t p-4">{{ $event->title }}</td>
                                <td class="border-t p-4 text-gray-600">{{ $event->description }}</td>
                                <td class="border-t p-4">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                                <td class="border-t p-4">{{ $event->location }}</td>
                                <td class="border-t p-4 flex justify-center">
                                    <a
                                        href="{{ route('tickets.purchase', $event->id) }}"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow transition"
                                    >
                                        Comprar Tickets
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

@endsection
