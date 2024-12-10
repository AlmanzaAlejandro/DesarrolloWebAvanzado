<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-100 min-h-screen font-sans">

<!-- Barra Superior -->
<header class="bg-blue-700 text-white py-4">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-4xl font-extrabold">Eventify</h1>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-800 rounded transition">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded transition">Sign Up</a>
        </div>
    </div>
</header>

<!-- Contenedor Principal -->
<div class="container mx-auto mt-8 flex space-x-8">
    <!-- Cuadro Descripción -->
    <div class="bg-blue-500 text-white p-8 w-1/3 rounded-lg shadow-lg">
        <p class="text-lg mb-6">
            Descubre, participa y organiza los mejores eventos. Con Eventify, es fácil conectarte con experiencias únicas,
            aprender nuevas habilidades y conocer personas increíbles.
        </p>
        <ul class="space-y-4 text-sm">
            <li>✅ Encuentra eventos personalizados.</li>
            <li>✅ Únete a talleres y conferencias.</li>
            <li>✅ Comparte experiencias con otros asistentes.</li>
        </ul>
    </div>

    <!-- Tarjetas de Eventos -->
    <div class="flex-1">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Próximos Eventos</h2>

        @if($events->isEmpty())
            <p class="text-gray-500 text-center">No hay eventos disponibles en este momento.</p>
        @else
            <div class="grid grid-cols-2 gap-8">
                @foreach($events as $event)
                    <!-- Tarjeta de Evento -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                        <img src="{{ $event->image_url ?? 'https://via.placeholder.com/400x200' }}" alt="Evento {{ $event->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-800">{{ $event->title }}</h3>
                            <p class="text-sm text-gray-500 mt-2">{{ $event->description }}</p>
                            <div class="text-xs text-gray-400 mt-4">
                                <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                                <p><strong>Ubicación:</strong> {{ $event->location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

</body>
</html>
