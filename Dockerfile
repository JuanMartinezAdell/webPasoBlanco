# Utiliza una imagen oficial de PHP 8.1 en modo FPM (FastCGI Process Manager) como base
FROM php:8.1-fpm

# Instala las dependencias necesarias para el proyecto
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libzip-dev \
        unzip \
        curl \
        libonig-dev \
        libxml2-dev \
        libpq-dev \
        && docker-php-ext-install pdo_mysql zip \
        && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
        && docker-php-ext-install pdo pdo_pgsql

# Instala Node.js y NPM
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos de Composer y RoadRunner desde sus respectivas imágenes
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=spiralscout/roadrunner:2.4.2 /usr/bin/rr /usr/bin/rr

# Crea el directorio de trabajo y copia los archivos del proyecto
WORKDIR /app
COPY . /app

# Copia el archivo .env.example y crea el directorio de logs
COPY .env.example .env
RUN mkdir -p /app/storage/logs

# Instala las dependencias de PHP y NPM, y compila los assets
RUN composer install --no-dev --optimize-autoloader && \
    npm install && \
    npm run prod

# Configura la conexión a la base de datos en el archivo .env
ENV DB_CONNECTION=mysql
ENV DB_HOST=db
ENV DB_PORT=3306
ENV DB_DATABASE=my_database
ENV DB_USERNAME=my_user
ENV DB_PASSWORD=my_password

# Crea la base de datos y ejecuta las migraciones
RUN php artisan migrate --force

# Configura Laravel Octane con Swoole y luego inicia el servidor
RUN php artisan octane:install --server="swoole"
CMD php artisan octane:start --server="swoole" --host="0.0.0.0"

# Ejecuta los comandos para limpiar la cache de Laravel
RUN php artisan cache:clear && \
    php artisan view:clear && \
    php artisan config:clear

# Expone el puerto 8000 del contenedor
EXPOSE 8000
