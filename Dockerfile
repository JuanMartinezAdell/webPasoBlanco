FROM php:8.1.17-fpm-alpine

RUN apk --no-cache upgrade && \
    apk --no-cache add bash git sudo openssh libxml2-dev oniguruma-dev autoconf gcc g++ make npm freetype-dev libjpeg-turbo-dev libpng-dev libzip-dev libmcrypt-dev

# PHP: Install php extensions
RUN pecl install swoole
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install mbstring xml iconv pcntl gd zip sockets pdo pdo_mysql bcmath soap intl opcache curl

RUN docker-php-ext-enable mbstring xml gd iconv zip pcntl sockets bcmath pdo pdo_mysql soap swoole opcache

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=spiralscout/roadrunner:2.4.2 /usr/bin/rr /usr/bin/rr

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN composer require laravel/octane spiral/roadrunner
RUN composer require inertiajs/inertia-laravel
COPY .env.example .env
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan config:clear

RUN php artisan key:generate
RUN php artisan octane:install --server="swoole"

CMD php artisan octane:start --server="swoole" --host="0.0.0.0"

EXPOSE 8000
