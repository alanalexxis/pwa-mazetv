# MazePWA 🎥

MazePWA es una aplicación web progresiva (PWA) que ofrece a los usuarios una experiencia inmersiva para explorar un extenso catálogo de series de televisión y películas. Utilizando la API de TVmaze, nuestra aplicación proporciona información detallada y actualizada sobre una amplia variedad de contenidos audiovisuales.

## Características ✨

-   Catálogo completo de series y películas con detalles como título, género, año de lanzamiento, sinopsis, imagen y calificación.
-   Búsqueda y filtrado avanzado por nombre de serie o película.
-   Sistema de registro y autenticación de usuarios con almacenamiento local para acceso offline.
-   Lista personalizada de favoritos accesible sin conexión.

## Tecnologías 🛠️

### Frontend

-   Blade
-   HTML5
-   CSS (Tailwind CSS)
-   JavaScript

### Backend

-   Laravel
-   MySQL

### Otros

-   Laravel PWA
-   Tailwind CSS
-   Alpine.js

## Instalación 🚀

1. Clona el repositorio:

    ```sh
    git clone https://github.com/alanalexxis/pwa-mazetv.git
    cd mazepwa
    ```

2. Instala las dependencias de PHP:

    ```sh
    composer install
    ```

3. Instala las dependencias de JavaScript:

    ```sh
    npm install
    ```

4. Copia el archivo de entorno y configura tus variables:

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

5. Configura tu base de datos en el archivo `.env`.

6. Ejecuta las migraciones y los seeders:

    ```sh
    php artisan migrate --seed
    ```

7. Inicia el servidor de desarrollo:
    ```sh
    php artisan serve
    npm run dev
    ```

## Contribución 🤝

¡Las contribuciones son bienvenidas! Por favor, sigue los pasos a continuación para contribuir:

1. Haz un fork del proyecto.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Sube tus cambios a tu repositorio (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## Licencia 📜

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## Autor 👨‍💻

Creado con ❤️ por AlanAlexxis.
