FROM php:8.4-cli

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Create .env from example and generate APP_KEY
RUN cp .env.example .env && \
    php artisan key:generate

# Set session and cache drivers to file (no database required)
RUN sed -i 's/SESSION_DRIVER=database/SESSION_DRIVER=file/' .env && \
    sed -i 's/CACHE_STORE=database/CACHE_STORE=file/' .env

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chmod -R 775 storage bootstrap/cache

EXPOSE ${PORT:-10000}

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}