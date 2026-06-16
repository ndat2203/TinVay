FROM php:8.3.26-cli

WORKDIR /var/www

# Cài extension cần thiết
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy source code
COPY . .

# Cài dependencies Laravel
RUN composer install --no-dev --optimize-autoloader

# Mở port Render
EXPOSE 10000

# Start Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000