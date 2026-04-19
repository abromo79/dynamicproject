FROM php:8.3-cli

# Install system dependencies AND PostgreSQL driver
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    libpq-dev \
    && docker-php-ext-install zip pdo_pgsql pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Install dependencies and setup Laravel
RUN composer install --no-dev --optimize-autoloader && \
    php artisan config:clear && \
    php artisan config:cache

# Set proper permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache || true

EXPOSE 10000

# Better PHP server command with proper configuration
CMD php -S 0.0.0.0:10000 -t public