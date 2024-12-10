@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8 border border-blue-200">
                <!-- Botón de Regresar -->
                <div class="mb-6">
                    <a
                        href="{{ route('organizer.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-lg shadow transition"
                    >
                        ← Regresar a la lista de eventos
                    </a>
                </div>

                <h1 class="text-3xl font-extrabold text-blue-700 mb-6 text-center">Editar Evento</h1>

                <form action="{{ route('organizer.update', $event->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Campo Título -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-blue-700">Título</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ $event->title }}"
                            required
                        >
                    </div>

                    <!-- Campo Descripción -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-blue-700">Descripción</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ $event->description }}</textarea>
                    </div>

                    <!-- Campo Fecha -->
                    <div>
                        <label for="event_date" class="block text-sm font-semibold text-blue-700">Fecha del Evento</label>
                        <input
                            type="date"
                            name="event_date"
                            id="event_date"
                            class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') }}"
                            required
                        >
                    </div>

                    <!-- Campo Ubicación -->
                    <div>
                        <label for="location" class="block text-sm font-semibold text-blue-700">Ubicación</label>
                        <input
                            type="text"
                            name="location"
                            id="location"
                            class="w-full mt-2 p-3 border border-blue-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ $event->location }}"
                            required
                        >
                    </div>

                    <!-- Botón Actualizar -->
                    <div class="flex justify-center">
                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition font-bold"
                        >
                            Actualizar Evento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
