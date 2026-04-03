# Gamit og PHP 8.2 nga naay Apache
FROM php:8.2-apache

# I-install ang gikinahanglan nga extensions para sa Laravel/Lumen
RUN apt-get update && apt-get install -x libzip-dev zip -y \
    && docker-php-ext-install zip pdo_mysql

# I-enable ang Apache mod_rewrite para sa routing
RUN a2enmod rewrite

# I-set ang Document Root sa 'public' folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/目录!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# I-copy ang imong code sa sulod sa container
COPY . /var/www/html

# I-install ang Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader

# I-set ang permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache