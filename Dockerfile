FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Empêche Symfony de charger .env pendant le build
ENV APP_ENV=prod
ENV APP_DEBUG=0

# Fake DB pour éviter les erreurs pendant cache:clear
ENV SYMFONY_BUILD_DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

# Composer install en prod
RUN DATABASE_URL=$SYMFONY_BUILD_DATABASE_URL composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
