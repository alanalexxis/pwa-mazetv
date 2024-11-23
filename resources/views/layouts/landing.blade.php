{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            rel="stylesheet"
        />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
        @laravelPWA
    </head>
    <body
        class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]"
    >
        <header>
            @include("partials.navbar")
            {{-- Incluirás la barra de navegación en todas las vistas --}}
        </header>

        <main class="container mx-auto max-w-screen-xl px-4 py-8">
            @yield("content")
        </main>
        <footer class="w-full bg-white p-8">
            <div
                class="flex flex-row flex-wrap items-center justify-center gap-x-12 gap-y-6 bg-white text-center md:justify-between"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-10 w-10"
                >
                    <path
                        d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z"
                    />
                    <path
                        d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z"
                    />
                    <path
                        d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z"
                    />
                </svg>

                <ul class="flex flex-wrap items-center gap-x-8 gap-y-2">
                    <li>
                        <a
                            href="#"
                            class="text-sm text-slate-700 hover:text-slate-500 focus:text-slate-500"
                        >
                            Acerca de nosotros
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-sm text-slate-700 hover:text-slate-500 focus:text-slate-500"
                        >
                            Licencia
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-sm text-slate-700 hover:text-slate-500 focus:text-slate-500"
                        >
                            Términos de uso
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="text-sm text-slate-700 hover:text-slate-500 focus:text-slate-500"
                        >
                            Contacto
                        </a>
                    </li>
                </ul>
            </div>
            <p
                class="mb-4 mt-4 block border-t border-slate-200 pt-4 text-center text-sm text-slate-500 md:mb-0"
            >
                Copyright © {{ date("Y") }} &nbsp;
                <a
                    href="https://material-tailwind.com/"
                    target="_blank"
                    rel="noreferrer"
                >
                    MazePWA
                </a>
                .
            </p>
        </footer>
    </body>
</html>
