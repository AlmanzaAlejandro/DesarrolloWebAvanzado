@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Eventos</h1>
        <a href="{{ route('organizer.create') }}" class="btn btn-primary">Crear Nuevo Evento</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->event_date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ route('organizer.edit', $event->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('organizer.destroy', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este evento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
