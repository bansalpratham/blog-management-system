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

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set up .env and generate APP_KEY
RUN cp .env.example .env || echo "APP_KEY=" > .env && \
    php artisan key:generate --force

# Permissions
RUN chmod -R 775 storage bootstrap/cache

ARG PORT=10000
EXPOSE $PORT

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}