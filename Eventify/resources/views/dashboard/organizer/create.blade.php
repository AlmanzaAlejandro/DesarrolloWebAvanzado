@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Evento</h1>

        <form action="{{ route('organizer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Fecha del Evento</label>
                <input type="date" name="event_date" id="event_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location">Ubicación</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Guardar Evento</button>
        </form>
    </div>
@endsection
