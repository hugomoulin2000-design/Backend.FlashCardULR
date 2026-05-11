FROM php:8.2-fpm

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql zip intl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# 🔥 Remove Symfony cache BEFORE build
RUN rm -rf var/cache/*

# Fake env vars for build (Render will override them at runtime)
ENV APP_ENV=prod
ENV APP_DEBUG=0
ENV DATABASE_VERSION=15

# ❌ DO NOT SET DATABASE_URL HERE
# Render injects DATABASE_URL automatically at runtime

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 🔥 Clear prod cache AFTER build
RUN php bin/console cache:clear --env=prod

# Expose port for Render
EXPOSE 10000

# Start Symfony with built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
