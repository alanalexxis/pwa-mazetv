@extends("layouts.movies")

@section("content")
    <div class="container mx-auto px-4">
        @if (isset($query))
            <h2 class="mb-8 text-center text-4xl font-bold text-red-500">
                Resultados de búsqueda para "{{ $query }}"
            </h2>
        @else
            <h2 class="mb-8 text-center text-4xl font-bold text-red-500">
                Mis shows guardados
            </h2>
        @endif

        <div
            class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
            id="shows-container"
        >
            <!-- Shows will be loaded here via JavaScript -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Cargar shows desde localStorage
            const shows = JSON.parse(localStorage.getItem('favoritedShows'));

            if (shows && shows.length > 0) {
                const container = document.getElementById('shows-container');
                shows.forEach((show) => {
                    const showElement = document.createElement('div');
                    showElement.classList.add(
                        'movie-card',
                        'group',
                        'relative',
                        'overflow-hidden',
                        'rounded-lg',
                        'shadow-lg',
                    );
                    showElement.innerHTML = `
                        <img
                            src="${show.show.image.medium ?? 'https://via.placeholder.com/210x295?text=No+Image'}"
                            alt="${show.show.name}"
                            class="h-auto w-full object-cover transition-transform duration-300 group-hover:scale-110"
                        />
                        <div
                            class="movie-overlay absolute inset-0 flex flex-col justify-end bg-black bg-opacity-50 p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
                        >
                            <h3 class="mb-2 truncate text-lg font-bold text-white">${show.show.name}</h3>
                            <p class="mb-3 text-sm text-gray-300">
                                ${show.show.premiered ? new Date(show.show.premiered).getFullYear() : 'N/A'}
                            </p>
                            <a
                                href="${show.show.url}"
                                target="_blank"
                                class="rounded-full bg-red-500 px-4 py-2 text-center text-white transition-colors duration-300 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            >
                                Más Información
                            </a>
                            <button
                                class="favorite-btn absolute right-2 top-2 z-10 rounded-full bg-white p-2 text-red-500 opacity-0 transition-all duration-300 hover:text-red-600 group-hover:opacity-100"
                                onclick="toggleFavorite(this, '${show.show.id}', '${show.show.name}', '${show.show.image.medium ?? 'https://via.placeholder.com/210x295?text=No+Image'}', '${show.show.premiered ?? 'N/A'}', '${show.show.url}')"
                                aria-label="Añadir a favoritos"
                                data-show-id="${show.show.id}"
                                data-show-name="${show.show.name}"
                                data-show-image="${show.show.image.medium ?? 'https://via.placeholder.com/210x295?text=No+Image'}"
                                data-show-premiered="${show.show.premiered ?? 'N/A'}"
                                data-show-url="${show.show.url}"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 transition-all duration-300"
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
                            <div class="favorite-message absolute left-2 top-2 z-10 rounded-full bg-white px-2 py-1 text-sm text-red-500 opacity-0 transition-all duration-300">
                                <span class="add-message">Agregado a favoritos</span>
                                <span class="remove-message hidden">Eliminado de favoritos</span>
                            </div>
                        </div>
                    `;
                    container.appendChild(showElement);
                });
            } else {
                // Si no hay shows en localStorage, mostrar mensaje
                const container = document.getElementById('shows-container');
                const noShowsMessage = `
                     <div class="flex flex-col items-center justify-center space-y-4">
                        <svg class="h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-center text-xl text-gray-400">No se encontraron shows.</p>
                    </div>
                `;
                container.innerHTML = noShowsMessage;
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Marcar todos los íconos como favoritos (rellenos) por defecto
            const favoriteButtons = document.querySelectorAll('.favorite-btn');
            favoriteButtons.forEach((button) => {
                const icon = button.querySelector('svg');
                icon.classList.add('fill-current', 'text-red-600'); // Ícono relleno por defecto
            });
        });

        function toggleFavorite(
            button,
            showId,
            showName,
            showImage,
            showPremiered,
            showUrl,
        ) {
            const favoriteMessage = button
                .closest('.movie-card')
                .querySelector('.favorite-message');

            // Si no hay conexión, eliminar el relleno del ícono y mostrar mensaje de eliminado
            if (!navigator.onLine) {
                button.classList.remove('text-red-600');
                const icon = button.querySelector('svg');
                icon.classList.remove('fill-current'); // Quitar el relleno

                // Mostrar mensaje de "Eliminado de favoritos"
                favoriteMessage.classList.remove('opacity-0');
                favoriteMessage.classList.add('opacity-100');
                favoriteMessage
                    .querySelector('.add-message')
                    .classList.add('hidden');
                favoriteMessage
                    .querySelector('.remove-message')
                    .classList.remove('hidden');

                // Guardar la solicitud de eliminar en localStorage
                saveRequestToLocalStorage({
                    action: 'remove',
                    showId,
                    showName,
                    showImage,
                    showPremiered,
                    showUrl,
                });

                // Ocultar el mensaje de favorito eliminado después de 2 segundos
                setTimeout(() => {
                    favoriteMessage.classList.remove('opacity-100');
                    favoriteMessage.classList.add('opacity-0');
                }, 2000);

                return;
            }

            // Realizar solicitud de agregar/eliminar favorito
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
                    const isFavorited = data.action === 'added';
                    button.classList.toggle('text-red-600', isFavorited);
                    const icon = button.querySelector('svg');
                    icon.classList.toggle('fill-current', isFavorited);

                    // Mostrar el mensaje de favorito agregado o eliminado
                    favoriteMessage.classList.remove('opacity-0');
                    favoriteMessage.classList.add('opacity-100');
                    favoriteMessage
                        .querySelector('.add-message')
                        .classList.toggle('hidden', !isFavorited);
                    favoriteMessage
                        .querySelector('.remove-message')
                        .classList.toggle('hidden', isFavorited);

                    // Ocultar el mensaje de favorito después de 2 segundos
                    setTimeout(() => {
                        favoriteMessage.classList.remove('opacity-100');
                        favoriteMessage.classList.add('opacity-0');
                    }, 2000);
                })
                .catch((error) => console.error('Error:', error));
        }

        function saveRequestToLocalStorage(requestData) {
            const requests =
                JSON.parse(localStorage.getItem('pendingRequests')) || [];
            requests.push(requestData);
            localStorage.setItem('pendingRequests', JSON.stringify(requests));
        }

        window.addEventListener('online', function () {
            // Procesar solicitudes pendientes
            const pendingRequests =
                JSON.parse(localStorage.getItem('pendingRequests')) || [];
            if (pendingRequests.length > 0) {
                pendingRequests.forEach((request) => {
                    // Reintentar eliminar favorito cuando haya conexión
                    if (request.action === 'remove') {
                        fetch('{{ route("like.show") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                show_id: request.showId,
                                show_name: request.showName,
                                show_image: request.showImage,
                                show_premiered: request.showPremiered,
                                show_url: request.showUrl,
                            }),
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                const button = document.querySelector(
                                    `[data-show-id="${request.showId}"]`,
                                );
                                const favoriteMessage = button
                                    .closest('.movie-card')
                                    .querySelector('.favorite-message');

                                // Mostrar mensaje de "Eliminado de favoritos" una vez que se procese la solicitud
                                favoriteMessage
                                    .querySelector('.add-message')
                                    .classList.add('hidden');
                                favoriteMessage
                                    .querySelector('.remove-message')
                                    .classList.remove('hidden');
                            })
                            .catch((error) => console.error('Error:', error));
                    }
                });
                localStorage.removeItem('pendingRequests');
            }
        });
    </script>
@endsection
