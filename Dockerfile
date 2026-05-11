FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql zip intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Fake env vars for build
ENV APP_ENV=prod
ENV APP_DEBUG=0
ENV DATABASE_URL=postgres://fake:fake@localhost:5432/fake
ENV DATABASE_VERSION=15

RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
