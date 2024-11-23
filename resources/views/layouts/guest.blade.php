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

        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div
            class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900"
        >
            <div>
                <a href="/">
                    <x-application-logo
                        class="h-20 w-20 fill-current text-gray-500"
                    />
                </a>
            </div>

            <div
                class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800"
            >
                {{ $slot }}
                <!-- ... -->
                <div
                    x-data="{ online: navigator.onLine, showRestored: false }"
                    x-init="
                        window.addEventListener('online', () => {
                            online = true
                            showRestored = true
                            setTimeout(() => (showRestored = false), 3000) // El mensaje desaparece después de 3 segundos
                        })
                        window.addEventListener('offline', () => (online = false))
                    "
                >
                    <div
                        x-show="!online"
                        class="fixed bottom-0 left-0 right-0 bg-red-500 py-2 text-center text-white"
                    >
                        No hay conexión a Internet
                    </div>
                    <div
                        x-show="showRestored"
                        class="fixed bottom-0 left-0 right-0 bg-green-500 py-2 text-center text-white"
                    >
                        Conexión a Internet restaurada
                    </div>
                </div>

                <!-- ... -->
            </div>
        </div>
    </body>
</html>
