FROM php:8.2-cli-alpine

WORKDIR /var/www/html

RUN apk update && apk add --no-cache \
    git \
    zip \
    unzip \
    mysql-client \
    curl

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . .

RUN composer install --no-interaction --no-dev --optimize-autoloader

# Add this to ensure the server starts properly
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]