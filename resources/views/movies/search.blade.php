@extends("layouts.movies")

@section("content")
    <div class="container mx-auto px-4">
        @if (isset($query))
            <h2 class="mb-8 text-center text-4xl font-bold text-red-500">
                Resultados de búsqueda para "{{ $query }}"
            </h2>
        @else
            <h2 class="mb-8 text-center text-4xl font-bold text-red-500">
                Películas Populares
            </h2>
        @endif

        @if (isset($shows) && count($shows) > 0)
            <div
                class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
            >
                @foreach ($shows as $show)
                    <div
                        class="movie-card group relative overflow-hidden rounded-lg shadow-lg"
                    >
                        <img
                            src="{{ $show["show"]["image"]["medium"] ?? "https://via.placeholder.com/210x295?text=No+Image" }}"
                            alt="{{ $show["show"]["name"] }}"
                            class="h-auto w-full object-cover transition-transform duration-300 group-hover:scale-110"
                        />
                        <div
                            class="movie-overlay absolute inset-0 flex flex-col justify-end p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            <h3
                                class="mb-2 truncate text-lg font-bold text-white"
                            >
                                {{ $show["show"]["name"] }}
                            </h3>
                            <p class="mb-3 text-sm text-gray-300">
                                @if ($show["show"]["premiered"])
                                    {{ \Carbon\Carbon::parse($show["show"]["premiered"])->format("Y") }}
                                @else
                                        N/A
                                @endif
                            </p>
                            <a
                                href="{{ $show["show"]["url"] }}"
                                target="_blank"
                                class="rounded-full bg-red-500 px-4 py-2 text-center text-white transition-colors duration-300 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            >
                                Más Información
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col items-center justify-center space-y-4">
                <svg
                    class="h-24 w-24 text-gray-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                </svg>
                <p class="text-center text-xl text-gray-400">
                    No se encontraron películas que coincidan con tu búsqueda.
                </p>
                <a
                    href="/"
                    class="mt-4 rounded-full bg-red-500 px-6 py-2 text-white transition-colors duration-300 hover:bg-red-600"
                >
                    Volver al inicio
                </a>
            </div>
        @endif
    </div>
@endsection
