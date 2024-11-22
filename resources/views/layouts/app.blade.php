<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield("title", "MazePWA")</title>
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #0f172a;
                color: #e2e8f0;
            }
        </style>
    </head>
    <body class="flex min-h-screen flex-col font-sans antialiased">
        <nav class="bg-gradient-to-r from-slate-900 to-slate-800 shadow-lg">
            <div class="container mx-auto px-4 py-4">
                <div
                    class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0"
                >
                    <a
                        href="/dashboard"
                        class="text-3xl font-bold text-red-500 transition duration-300 hover:text-red-400"
                    >
                        MazePWA
                    </a>
                    <div class="flex items-center space-x-4">
                        <form
                            action="{{ route("dashboard") }}"
                            method="GET"
                            class="flex w-full md:w-auto"
                        >
                            <input
                                type="text"
                                name="query"
                                placeholder="Buscar shows..."
                                class="w-full rounded-l-full px-6 py-3 text-black placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-red-500 md:w-64"
                            />
                            <button
                                type="submit"
                                class="rounded-r-full bg-red-500 px-6 py-3 text-white transition duration-300 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </form>
                        <div x-data="{ open: false }" class="relative">
                            <button
                                @click="open = !open"
                                class="flex items-center space-x-2 rounded-full bg-red-500 px-4 py-2 text-white transition duration-300 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                <span></span>
                            </button>
                            <div
                                x-show="open"
                                @click.away="open = false"
                                x-transition:enter="transition duration-200 ease-out"
                                x-transition:enter-start="scale-95 transform opacity-0"
                                x-transition:enter-end="scale-100 transform opacity-100"
                                x-transition:leave="transition duration-75 ease-in"
                                x-transition:leave-start="scale-100 transform opacity-100"
                                x-transition:leave-end="scale-95 transform opacity-0"
                                class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-2 shadow-xl ring-1 ring-black ring-opacity-5"
                            >
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="mr-3 h-5 w-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ Auth::user()->name }}
                                </a>
                                <a
                                    href="/profile"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="mr-3 h-5 w-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    Ajustes
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-2 text-sm text-red-600 transition duration-150 ease-in-out hover:bg-gray-100"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="mr-3 h-5 w-5 text-red-500"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    Cerrar sesión
                                </a>

                                <form
                                    id="logout-form"
                                    method="POST"
                                    action="{{ route("logout") }}"
                                    style="display: none"
                                >
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <footer class="bg-slate-900 py-6 text-center text-sm text-gray-400">
            <div class="container mx-auto px-4">
                <p>
                    &copy; {{ date("Y") }} MazePWA. Todos los derechos
                    reservados.
                </p>
            </div>
        </footer>
        <script
            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
            defer
        ></script>
    </body>
</html>
