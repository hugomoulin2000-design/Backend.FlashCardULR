FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql zip intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# 🔥 Supprimer tout cache Symfony avant build
RUN rm -rf var/cache/*

# Fake env vars for build
ENV APP_ENV=prod
ENV APP_DEBUG=0
ENV DATABASE_VERSION=15

# ❌ NE PAS définir DATABASE_URL ici
# Render l'injectera au runtime

# Install PHP dependencies SANS scripts Symfony
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# 🔥 Clear prod cache APRÈS build, quand tout est en place
RUN php bin/console cache:clear --env=prod --no-warmup

EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
