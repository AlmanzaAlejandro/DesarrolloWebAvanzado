@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Evento</h1>

        <form action="{{ route('organizer.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Fecha del Evento</label>
                <input type="date" name="event_date" id="event_date" class="form-control" value="{{ $event->event_date }}" required>
            </div>

            <div class="form-group">
                <label for="location">Ubicación</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar Evento</button>
        </form>
    </div>
@endsection
