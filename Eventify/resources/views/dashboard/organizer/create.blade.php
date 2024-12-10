@extends('layouts.app')

@section('content')
    <div class="container py-8">
        <!-- Contenedor del formulario -->
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 border border-gray-200">

            <!-- Botón de Regresar -->
            <div class="mb-6">
                <a
                    href="{{ route('organizer.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-lg shadow transition"
                >
                    ← Regresar a la lista de eventos
                </a>
            </div>

            <!-- Título de la página -->
            <h1 class="text-3xl font-semibold text-green-700 mb-6 text-center">Crear Nuevo Evento</h1>

            <!-- Formulario de creación de evento -->
            <form action="{{ route('organizer.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Campo Título -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-green-700">Título</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <!-- Campo Descripción -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-green-700">Descripción</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                    ></textarea>
                </div>

                <!-- Campo Fecha -->
                <div>
                    <label for="event_date" class="block text-sm font-semibold text-green-700">Fecha del Evento</label>
                    <input
                        type="date"
                        name="event_date"
                        id="event_date"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <!-- Campo Ubicación -->
                <div>
                    <label for="location" class="block text-sm font-semibold text-green-700">Ubicación</label>
                    <input
                        type="text"
                        name="location"
                        id="location"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                        required
                    >
                </div>

                <!-- Botón Guardar -->
                <div class="flex justify-center mt-6">
                    <button
                        type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-green-700 transition font-bold"
                    >
                        Guardar Evento
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
