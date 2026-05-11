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
ENV DATABASE_VERSION=15

ARG DATABASE_URL
ENV DATABASE_URL=${DATABASE_URL}


RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN php bin/console cache:clear --env=prod
RUN php bin/console cache:clear --env=dev


EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
