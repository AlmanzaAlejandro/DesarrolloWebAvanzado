@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h1>Comprando Tickets</h1>
        <p>Estás comprando tickets para el evento: <strong>{{ $event->title }}</strong></p>
    </div>
@endsection
