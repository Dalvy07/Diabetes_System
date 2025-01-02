FROM php:8.2-fpm
# Если не работает попробовать 8.2.7-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    build-essential \
    curl \
    && docker-php-ext-install pdo pdo_mysql mbstring xml

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www/html
