<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Compra</title>
</head>
<body>
<h1>¡Gracias por tu compra!</h1>
<p>Has comprado {{ $ticket->quantity }} ticket(s) para el evento "{{ $ticket->event->title }}" el {{ \Carbon\Carbon::parse($ticket->event->event_date)->format('d M Y') }}.</p>
<p>Tu compra ha sido procesada exitosamente.</p>
</body>
</html>
