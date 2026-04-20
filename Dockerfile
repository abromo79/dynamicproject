FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpq-dev nginx \
    && docker-php-ext-install zip pdo_pgsql pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Copy nginx config
COPY nginx.conf /etc/nginx/sites-enabled/default

EXPOSE 10000

CMD sh -c "php artisan migrate --force && php-fpm -D && nginx -g \"daemon off;\""