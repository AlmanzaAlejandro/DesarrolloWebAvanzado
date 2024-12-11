@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h1>Comprando Tickets</h1>
        <p>Estás comprando tickets para el evento: <strong>{{ $event->title }}</strong></p>
        <p>Precio por ticket: <strong>${{ number_format($event->price, 2) }}</strong></p>

        <form action="{{ route('tickets.buy', $event->id) }}" method="POST" id="payment-form">
            @csrf
            <div class="form-group">
                <label for="quantity">Cantidad de tickets:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Comprar</button>
        </form>
    </div>
@endsection
