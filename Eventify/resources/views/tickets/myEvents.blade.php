@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen">
        <div class="container mx-auto py-8 px-4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-extrabold text-gray-800">Mis Eventos</h1>
            </div>

            <!-- Sección de eventos futuros -->
            @if($upcomingEvents->isEmpty())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-6">
                    <p>No tienes eventos futuros.</p>
                </div>
            @else
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Próximos Eventos</h2>
                <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-8">
                    <table class="min-w-full border-collapse bg-white">
                        <thead>
                        <tr class="bg-blue-600 text-white text-left">
                            <th class="p-4">Título</th>
                            <th class="p-4">Fecha</th>
                            <th class="p-4">Ubicación</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($upcomingEvents as $ticket)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="border-t p-4">{{ $ticket->event->title }}</td>
                                <td class="border-t p-4">{{ \Carbon\Carbon::parse($ticket->event->event_date)->format('d M Y') }}</td>
                                <td class="border-t p-4">{{ $ticket->event->location }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <!-- Sección de eventos pasados -->
            @if($pastEvents->isEmpty())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded mb-6">
                    <p>No tienes eventos pasados.</p>
                </div>
            @else
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Eventos Pasados</h2>
                <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-8">
                    <table class="min-w-full border-collapse bg-white">
                        <thead>
                        <tr class="bg-gray-600 text-white text-left">
                            <th class="p-4">Título</th>
                            <th class="p-4">Fecha</th>
                            <th class="p-4">Ubicación</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pastEvents as $ticket)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="border-t p-4">{{ $ticket->event->title }}</td>
                                <td class="border-t p-4">{{ \Carbon\Carbon::parse($ticket->event->event_date)->format('d M Y') }}</td>
                                <td class="border-t p-4">{{ $ticket->event->location }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
