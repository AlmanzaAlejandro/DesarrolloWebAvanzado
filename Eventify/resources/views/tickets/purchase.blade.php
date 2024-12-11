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

                <form action="{{ route('tickets.buy', $event->id) }}" method="POST" id="payment-form">
            @csrf
            <div class="form-group">
                <label for="quantity">Cantidad de tickets:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Comprar</button>
        </form>

                <a href="{{ route('attendee.index') }}" class="block mt-4 text-blue-600 hover:underline">
                    Volver a la Lista de Eventos
                </a>
            </div>
        </div>
    </div>
@endsection
