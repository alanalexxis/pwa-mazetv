@extends('layouts.app')

@section('title', 'Acerca del Proyecto MazePWA')

@section('content')
<div class=" to-white min-h-screen py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-5xl font-extrabold mb-12 text-center text-purple-800 leading-tight">
            Catálogo de Películas <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-indigo-600">MazePWA</span>
        </h1>

        <div class="bg-white rounded-2xl shadow-xl p-8 mb-16 ">
            <h2 class="text-4xl font-bold mb-8 text-purple-700 border-b-2 border-purple-200 pb-4">Acerca del Proyecto</h2>
            <p class="text-gray-700 mb-8 leading-relaxed text-lg">
                MazePWA es una aplicación web progresiva (PWA) que ofrece a los usuarios una experiencia inmersiva para explorar un extenso catálogo de series de televisión y películas. Utilizando la API de TVmaze, nuestra aplicación proporciona información detallada y actualizada sobre una amplia variedad de contenidos audiovisuales.
            </p>

            <h3 class="text-3xl font-semibold mt-12 mb-6 text-purple-600">Características Principales</h3>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                @foreach(['Catálogo completo de series y películas con detalles como título, género, año de lanzamiento, sinopsis, imagen y calificación.', 'Búsqueda y filtrado avanzado por nombre de serie o película.', 'Sistema de registro y autenticación de usuarios con almacenamiento local para acceso offline.', 'Lista personalizada de favoritos accesible sin conexión.', 'Notificaciones en la interfaz de usuario y push para mantener a los usuarios informados.', 'Funcionalidad offline que permite navegar por favoritos y realizar búsquedas sin conexión a internet.'] as $feature)
                    <li class="flex items-start bg-purple-50 p-4 rounded-lg shadow">
                        <svg class="h-6 w-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span class="text-gray-800">{{ $feature }}</span>
                    </li>
                @endforeach
            </ul>

            <h3 class="text-3xl font-semibold mt-12 mb-6 text-purple-600">Tecnologías Utilizadas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-purple-100 to-indigo-100 p-6 rounded-xl shadow-md transform hover:scale-105 transition-transform duration-300">
                    <h4 class="font-bold mb-4 text-purple-700 text-xl">Frontend:</h4>
                    <ul class="space-y-3">
                        @foreach(['Blade (motor de plantillas)', 'HTML5', 'CSS (Tailwind CSS)', 'JavaScript'] as $tech)
                            <li class="flex items-center bg-white bg-opacity-60 p-2 rounded-lg">
                                <svg class="h-5 w-5 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                {{ $tech }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-indigo-100 to-purple-100 p-6 rounded-xl shadow-md transform hover:scale-105 transition-transform duration-300">
                    <h4 class="font-bold mb-4 text-indigo-700 text-xl">Backend:</h4>
                    <ul class="space-y-3">
                        @foreach(['Laravel (API REST)', 'MySQL', 'Service Workers', 'Push API'] as $tech)
                            <li class="flex items-center bg-white bg-opacity-60 p-2 rounded-lg">
                                <svg class="h-5 w-5 text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                {{ $tech }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <h3 class="text-3xl font-semibold mt-12 mb-6 text-purple-600">API de TVmaze</h3>
            <p class="text-gray-700 mb-4 text-lg">Nuestra aplicación se integra con la API de TVmaze para obtener datos actualizados:</p>
            <div class="bg-gray-800 text-white p-6 rounded-lg shadow-inner overflow-x-auto">
                <p class="font-mono text-sm mb-3"><span class="text-green-400">GET</span> https://api.tvmaze.com/search/shows?q={query}</p>
                <p class="font-mono text-sm"><span class="text-green-400">GET</span> https://api.tvmaze.com/shows/{id}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 ">
            <h2 class="text-4xl font-bold mb-8 text-purple-700 border-b-2 border-purple-200 pb-4">Nuestro equipo</h2>
            <p class="text-gray-700 mb-8 leading-relaxed text-lg">
                El equipo detrás de MazePWA está compuesto por desarrolladores apasionados y expertos en tecnologías web modernas. Cada miembro aporta habilidades únicas para crear una experiencia de usuario excepcional.
            </p>
            <!-- Aquí puedes agregar información sobre los miembros del equipo si lo deseas -->
        </div>
    </div>
</div>
@endsection
