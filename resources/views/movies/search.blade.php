@extends("layouts.movies")

@section("content")
    <div class="container mx-auto px-4 py-8">
        @if (isset($query))
            <h2 class="mb-8 text-center text-4xl font-bold text-red-500">
                Resultados de búsqueda para "{{ $query }}"
            </h2>
        @else
            <h2 class="mb-8 text-center text-4xl font-bold text-red-500">
                Mis shows guardados
            </h2>
        @endif

        @if (isset($shows) && count($shows) > 0)
            <div
                class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
            >
                @foreach ($shows as $show)
                    <div
                        class="movie-card group relative cursor-pointer overflow-hidden rounded-lg shadow-lg transition-transform duration-300 hover:scale-105"
                        onclick="openModal('{{ $show["show"]["id"] }}')"
                    >
                        <img
                            src="{{ $show["show"]["image"]["medium"] ?? "https://via.placeholder.com/210x295?text=No+Image" }}"
                            alt="{{ $show["show"]["name"] }}"
                            class="h-auto w-full object-cover"
                        />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        ></div>
                        <div
                            class="absolute bottom-0 left-0 right-0 p-4 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            <h3 class="truncate text-lg font-bold">
                                {{ $show["show"]["name"] }}
                            </h3>
                            <p class="text-sm text-gray-300">
                                @if ($show["show"]["premiered"])
                                    {{ \Carbon\Carbon::parse($show["show"]["premiered"])->format("Y") }}
                                @else
                                        N/A
                                @endif
                            </p>
                        </div>
                        <button
                            class="favorite-btn absolute right-2 top-2 z-10 rounded-full bg-white p-2 text-red-500 opacity-0 transition-all duration-300 hover:text-red-600 group-hover:opacity-100"
                            onclick="event.stopPropagation(); toggleFavorite(this, '{{ $show["show"]["id"] }}', '{{ $show["show"]["name"] }}', '{{ $show["show"]["image"]["medium"] ?? "https://via.placeholder.com/210x295?text=No+Image" }}', '{{ $show["show"]["premiered"] ?? "N/A" }}', '{{ $show["show"]["url"] }}')"
                            aria-label="Añadir a favoritos"
                            data-show-id="{{ $show["show"]["id"] }}"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="{{ in_array($show["show"]["id"], $favoritedShows) ? "fill-current text-red-600" : "" }} h-6 w-6 transition-all duration-300"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                fill="none"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                />
                            </svg>
                        </button>
                        <div
                            class="favorite-message absolute left-2 top-2 z-10 rounded-full bg-white px-2 py-1 text-sm text-red-500 opacity-0 transition-all duration-300"
                        >
                            <span class="add-message">
                                Agregado a favoritos
                            </span>
                            <span class="remove-message hidden">
                                Eliminado de favoritos
                            </span>
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
                    No se encontraron shows.
                </p>
                <a
                    href="{{ route("dashboard") }}"
                    class="mt-4 rounded-full bg-red-500 px-6 py-2 text-white transition-colors duration-300 hover:bg-red-600"
                >
                    Prueba a buscar o añadir shows
                </a>
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div
        id="showModal"
        class="fixed inset-0 z-50 flex hidden items-center justify-center overflow-auto bg-black bg-opacity-60"
    >
        <div class="mx-4 w-full max-w-2xl rounded-lg bg-black p-8">
            <div class="mb-4 flex items-center justify-between">
                <h2
                    id="modalTitle"
                    class="text-2xl font-bold text-gray-400"
                ></h2>
                <button
                    onclick="closeModal()"
                    class="text-gray-600 hover:text-gray-400"
                >
                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        ></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="text-gray-400"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shows = @json($shows);
            localStorage.setItem('favoritedShows', JSON.stringify(shows));
        });

        function toggleFavorite(
            button,
            showId,
            showName,
            showImage,
            showPremiered,
            showUrl,
        ) {
            console.log('Show ID:', showId);
            console.log('Show Name:', showName);
            console.log('Show Image:', showImage);
            console.log('Show Premiered:', showPremiered);
            console.log('Show Url:', showUrl);
            // Add animation classes
            button.classList.add('animate-favorite');
            const icon = button.querySelector('svg');
            icon.classList.add('animate-favorite-icon');

            // Get the favorite message element
            const favoriteMessage =
                button.parentElement.querySelector('.favorite-message');
            const addMessage = favoriteMessage.querySelector('.add-message');
            const removeMessage =
                favoriteMessage.querySelector('.remove-message');

            fetch('{{ route("like.show") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    show_id: showId,
                    show_name: showName,
                    show_image: showImage,
                    show_premiered: showPremiered,
                    show_url: showUrl,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    if (data.success) {
                        const isFavorited = data.action === 'added';
                        button.classList.toggle('text-red-600', isFavorited);
                        icon.classList.toggle('fill-current', isFavorited);

                        // Show the appropriate message
                        favoriteMessage.classList.remove('opacity-0');
                        favoriteMessage.classList.add('opacity-100');
                        if (isFavorited) {
                            addMessage.classList.remove('hidden');
                            removeMessage.classList.add('hidden');
                        } else {
                            addMessage.classList.add('hidden');
                            removeMessage.classList.remove('hidden');
                        }

                        // Hide the favorite message after 2 seconds
                        setTimeout(() => {
                            favoriteMessage.classList.remove('opacity-100');
                            favoriteMessage.classList.add('opacity-0');
                        }, 2000);
                    }
                })
                .catch((error) => console.error('Error:', error))
                .finally(() => {
                    // Remove animation classes after animation completes
                    setTimeout(() => {
                        button.classList.remove('animate-favorite');
                        icon.classList.remove('animate-favorite-icon');
                    }, 500);
                });
        }

        function openModal(showId) {
            const shows = JSON.parse(localStorage.getItem('favoritedShows'));
            const show = shows.find((s) => s.show.id == showId);

            if (show) {
                document.getElementById('modalTitle').textContent =
                    show.show.name;
                document.getElementById('modalContent').innerHTML = `
            <div class="flex flex-col md:flex-row">
                <img src="${show.show.image?.medium || 'https://via.placeholder.com/210x295?text=No+Image'}" alt="${show.show.name}" class="w-full md:w-1/3 object-cover rounded-lg mb-4 md:mb-0 md:mr-4">
                <div>
                    <p class="mb-2"><strong>Fecha de estreno:</strong> ${show.show.premiered || 'N/A'}</p>
                    <p class="mb-2"><strong>Status:</strong> ${show.show.status || 'N/A'}</p>
                    <p class="mb-2"><strong>Género:</strong> ${show.show.genres?.join(', ') || 'N/A'}</p>
                    <p class="mb-4"><strong>Resumen:</strong> ${show.show.summary || 'No summary available.'}</p>
                    <a href="${show.show.url}" target="_blank" class="mt-8 inline-block bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-colors duration-300">Ver en TVMaze</a>
                </div>
            </div>
        `;
                document.getElementById('showModal').classList.remove('hidden');
            }
        }

        function closeModal() {
            document.getElementById('showModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document
            .getElementById('showModal')
            .addEventListener('click', function (event) {
                if (event.target === this) {
                    closeModal();
                }
            });
    </script>

    <style>
        @keyframes favorite {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes favorite-icon {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }

        .animate-favorite {
            animation: favorite 0.5s ease-in-out;
        }

        .animate-favorite-icon {
            animation: favorite-icon 0.5s ease-in-out;
        }
    </style>
@endsection
