FROM php:8.2-fpm

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port for Render
EXPOSE 10000

# Start Symfony with built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]

