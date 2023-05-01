FROM php:8.1-fpm

# Instalar dependencias requeridas
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo_mysql mbstring xml zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar los archivos necesarios
WORKDIR /app
COPY . .
RUN rm -rf /app/vendor
RUN rm -rf /app/composer.lock



# Instalar dependencias
RUN composer diagnose
RUN composer install

# Configurar Inertia
RUN php artisan inertia:middleware

# Configurar Octane
RUN composer require laravel/octane spiral/roadrunner

# Copiar env, creamos log  y vaciamos cache...
COPY .env.example .env
RUN mkdir -p /app/storage/logs
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan config:clear

# Configurar Octane servidor swoole
RUN php artisan octane:install --server=swoole
RUN php artisan octane:configure
COPY .env.example .env
RUN mkdir -p /app/storage/logs

# Exponer el puerto
EXPOSE 8000

# Iniciar el servidor Octane
CMD ["php", "artisan", "octane:start", "--server=swoole"]
