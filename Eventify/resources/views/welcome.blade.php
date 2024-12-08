<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="text-center">
    <h1 class="text-4xl font-bold mb-6">Eventify</h1>
    <div class="space-x-4 mb-8">
        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Sign Up</a>
    </div>

    <!-- Sección de eventos -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold mb-4">Próximos Eventos</h2>

        @if($events->isEmpty())
            <p class="text-gray-500">No hay eventos disponibles en este momento.</p>
        @else
            <div class="space-y-6">
                @foreach($events as $event)
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800">{{ $event->title }}</h3>
                        <p class="text-gray-600 mt-2">{{ $event->description }}</p>
                        <p class="text-sm text-gray-500 mt-2"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                        <p class="text-sm text-gray-500"><strong>Ubicación:</strong> {{ $event->location }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

</body>
</html>
