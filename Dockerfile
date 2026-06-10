FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf