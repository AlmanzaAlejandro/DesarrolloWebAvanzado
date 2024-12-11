@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen flex justify-center items-center">
        <div class="bg-white shadow-lg p-8 rounded-lg w-full max-w-md">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Compra de Tickets</h1>
                <p class="text-gray-600 mb-6">
                    Estás comprando tickets para el evento:
                    <span class="font-semibold text-gray-800">{{ $event->title }}</span>
                </p>

                <form action="{{ route('tickets.complete', $event->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="quantity" class="block text-left font-medium text-gray-700 mb-1">Cantidad de Tickets</label>
                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            min="1"
                            class="w-full border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400"
                            placeholder="Ej. 2"
                            required
                        />
                    </div>
                </form>

                <a href="{{ route('attendee.index') }}" class="block mt-4 text-blue-600 hover:underline">
                    Volver a la Lista de Eventos
                </a>
            </div>
        </div>
    </div>
@endsection
