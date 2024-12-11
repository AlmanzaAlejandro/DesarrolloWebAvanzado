# Laravel Project

Este proyecto es una aplicación web desarrollada con el framework Laravel. Sigue estas instrucciones para configurar el entorno y ejecutar la aplicación localmente.

## Requisitos previos

Asegúrate de tener instalados los siguientes componentes:

- [PHP](https://www.php.net/) >= 8.0
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (para la compilación de activos)
- [MySQL](https://www.mysql.com/) o cualquier base de datos compatible con Laravel
- [Git](https://git-scm.com/)

## Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/tu-usuario/tu-repositorio.git
   cd tu-repositorio
   ```

2. Instala las dependencias de PHP usando Composer:

   ```bash
   composer install
   ```

3. Copia el archivo de configuración `.env.example` y renómbralo a `.env`:

   ```bash
   cp .env.example .env
   ```

4. Configura las variables de entorno en el archivo `.env`, especialmente las relacionadas con la base de datos:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=****
   DB_PORT=25060
   DB_DATABASE=db_eventify
   DB_USERNAME=doadmin
   DB_PASSWORD=****
   ```

5. Genera la clave de la aplicación:

   ```bash
   php artisan key:generate
   ```

6. Ejecuta las migraciones de la base de datos:

   ```bash
   php artisan migrate
   ```

7. Ejecuta también:

   ```bash
   php artisan db:seed
   ```

8. Instala las dependencias de Node.js y compila los activos:

   ```bash
   npm install
   npm run dev
   ```

## Ejecución

Inicia el servidor de desarrollo de Laravel:

```bash
php artisan serve
```

La aplicación estará disponible en [http://localhost:8000](http://localhost:8000).

