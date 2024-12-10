<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Dashboard - Organizador de Eventos') }}
    </h2>
</x-slot>

@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen">
        <div class="container mx-auto py-8 px-4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-extrabold text-gray-800">Tus Eventos</h1>
                <a href="{{ route('organizer.create') }}" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-lg transition">
                    Crear Nuevo Evento
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <table class="min-w-full border-collapse bg-white">
                    <thead>
                    <tr class="bg-blue-600 text-white text-left">
                        <th class="p-4">Título</th>
                        <th class="p-4">Descripción</th>
                        <th class="p-4">Fecha</th>
                        <th class="p-4">Ubicación</th>
                        <th class="p-4">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($events as $event)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="border-t p-4">{{ $event->title }}</td>
                            <td class="border-t p-4 text-gray-600">{{ $event->description }}</td>
                            <td class="border-t p-4">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                            <td class="border-t p-4">{{ $event->location }}</td>
                            <td class="border-t p-4 flex space-x-2">
                                <a href="{{ route('organizer.edit', $event->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">
                                    Editar
                                </a>
                                <form action="{{ route('organizer.destroy', $event->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-gray-500">No hay eventos registrados.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
