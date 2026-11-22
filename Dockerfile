
# PHP + Apache
FROM php:8.3-apache

# Required PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    bcmath \
    exif \
    gd \
    zip \
    intl \
 && a2enmod rewrite \
 && apt-get clean

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node for Vite assets
COPY --from=node:22 /usr/local/bin/node /usr/local/bin/node
COPY --from=node:22 /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

WORKDIR /var/www/html

# Install Composer dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install frontend dependencies and build
COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

# Apache public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/apache2.conf

RUN echo '<Directory /var/www/html/public>' >> /etc/apache2/apache2.conf \
    && echo 'AllowOverride All' >> /etc/apache2/apache2.conf \
    && echo 'Require all granted' >> /etc/apache2/apache2.conf \
    && echo '</Directory>' >> /etc/apache2/apache2.conf

# Permissions
RUN mkdir -p storage bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
