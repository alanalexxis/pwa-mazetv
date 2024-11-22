@extends("layouts.landing")

@section("title", "Acerca del Proyecto MazePWA")

@section("content")
    <div class="min-h-screen to-white py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1
                class="mb-12 text-center text-5xl font-extrabold leading-tight text-purple-800"
            >
                Catálogo de Películas
                <span
                    class="bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent"
                >
                    MazePWA
                </span>
            </h1>

            <div class="mb-16 rounded-2xl bg-white p-8 shadow-xl">
                <h2
                    class="mb-8 border-b-2 border-purple-200 pb-4 text-4xl font-bold text-purple-700"
                >
                    Acerca del Proyecto
                </h2>
                <p class="mb-8 text-lg leading-relaxed text-gray-700">
                    MazePWA es una aplicación web progresiva (PWA) que ofrece a
                    los usuarios una experiencia inmersiva para explorar un
                    extenso catálogo de series de televisión y películas.
                    Utilizando la API de TVmaze, nuestra aplicación proporciona
                    información detallada y actualizada sobre una amplia
                    variedad de contenidos audiovisuales.
                </p>

                <h3 class="mb-6 mt-12 text-3xl font-semibold text-purple-600">
                    Características Principales
                </h3>
                <ul class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach (["Catálogo completo de series y películas con detalles como título, género, año de lanzamiento, sinopsis, imagen y calificación.", "Búsqueda y filtrado avanzado por nombre de serie o película.", "Sistema de registro y autenticación de usuarios con almacenamiento local para acceso offline.", "Lista personalizada de favoritos accesible sin conexión.", "Notificaciones en la interfaz de usuario y push para mantener a los usuarios informados.", "Funcionalidad offline que permite navegar por favoritos y realizar búsquedas sin conexión a internet."] as $feature)
                        <li
                            class="flex items-start rounded-lg bg-purple-50 p-4 shadow"
                        >
                            <svg
                                class="mr-3 h-6 w-6 flex-shrink-0 text-green-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                            <span class="text-gray-800">{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>

                <h3 class="mb-6 mt-12 text-3xl font-semibold text-purple-600">
                    Tecnologías Utilizadas
                </h3>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div
                        class="transform rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 p-6 shadow-md transition-transform duration-300 hover:scale-105"
                    >
                        <h4 class="mb-4 text-xl font-bold text-purple-700">
                            Frontend:
                        </h4>
                        <ul class="space-y-3">
                            @foreach (["Blade (motor de plantillas)", "HTML5", "CSS (Tailwind CSS)", "JavaScript"] as $tech)
                                <li
                                    class="flex items-center rounded-lg bg-white bg-opacity-60 p-2"
                                >
                                    <svg
                                        class="mr-3 h-5 w-5 text-indigo-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                        ></path>
                                    </svg>
                                    {{ $tech }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div
                        class="transform rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 p-6 shadow-md transition-transform duration-300 hover:scale-105"
                    >
                        <h4 class="mb-4 text-xl font-bold text-indigo-700">
                            Backend:
                        </h4>
                        <ul class="space-y-3">
                            @foreach (["Laravel (API REST)", "MySQL", "Service Workers", "Push API"] as $tech)
                                <li
                                    class="flex items-center rounded-lg bg-white bg-opacity-60 p-2"
                                >
                                    <svg
                                        class="mr-3 h-5 w-5 text-purple-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                        ></path>
                                    </svg>
                                    {{ $tech }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <h3 class="mb-6 mt-12 text-3xl font-semibold text-purple-600">
                    API de TVmaze
                </h3>
                <p class="mb-4 text-lg text-gray-700">
                    Nuestra aplicación se integra con la API de TVmaze para
                    obtener datos actualizados:
                </p>
                <div
                    class="overflow-x-auto rounded-lg bg-gray-800 p-6 text-white shadow-inner"
                >
                    <p class="mb-3 font-mono text-sm">
                        <span class="text-green-400">GET</span>
                        https://api.tvmaze.com/search/shows?q={query}
                    </p>
                    <p class="font-mono text-sm">
                        <span class="text-green-400">GET</span>
                        https://api.tvmaze.com/shows/{id}
                    </p>
                </div>
            </div>

            <div class="rounded-2xl bg-white p-8 shadow-xl">
                <h2
                    class="mb-8 border-b-2 border-purple-200 pb-4 text-4xl font-bold text-purple-700"
                >
                    Nuestro equipo
                </h2>
                <p class="mb-8 text-lg leading-relaxed text-gray-700">
                    El equipo detrás de MazePWA está compuesto por
                    desarrolladores apasionados y expertos en tecnologías web
                    modernas. Cada miembro aporta habilidades únicas para crear
                    una experiencia de usuario excepcional.
                </p>
                <!-- Aquí puedes agregar información sobre los miembros del equipo si lo deseas -->
            </div>
        </div>
    </div>
@endsection
