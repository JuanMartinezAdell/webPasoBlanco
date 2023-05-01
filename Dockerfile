FROM php:8.0.11-fpm-alpine

RUN apk --no-cache upgrade && \
    apk --no-cache add bash git sudo openssh  libxml2-dev oniguruma-dev autoconf gcc g++ make npm freetype-dev libjpeg-turbo-dev libpng-dev libzip-dev

# PHP: Install php extensions
RUN pecl channel-update pecl.php.net && \
    pecl install pcov ssh2 swoole && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install mbstring xml iconv pcntl gd zip sockets pdo pdo_mysql bcmath soap && \
    docker-php-ext-enable mbstring xml gd iconv zip pcov pcntl sockets bcmath pdo pdo_mysql soap swoole

RUN curl -sS https://getcomposer.org/installer​ | php -- \
    --install-dir=/usr/local/bin --filename=composer && \
    ln -s /usr/local/bin/composer /usr/bin/composer

COPY --from=spiralscout/roadrunner:2.4.2 /usr/bin/rr /usr/bin/rr

WORKDIR /app
COPY . .

RUN composer install --no-dev --prefer-dist --no-scripts && \
    composer require laravel/octane spiral/roadrunner inertiajs/inertia-laravel --no-dev --prefer-dist --no-scripts && \
    cp .env.example .env && \
    php artisan key:generate && \
    php artisan octane:install --server="swoole"

CMD php artisan octane:start --server="swoole" --host="0.0.0.0"
EXPOSE 8000

