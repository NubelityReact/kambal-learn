FROM php:7.3-apache

RUN apt-get update && apt-get install -y \
    mariadb-client \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod rewrite

RUN mkdir /var/www/html/control-escolar

WORKDIR /var/www/html/control-escolar


COPY ./src .

# Update the document root to /var/www/html/control-escolar/src
# RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/control-escolar|g' /etc/apache2/sites-available/000-default.conf


RUN chown -R www-data:www-data /var/www/html


EXPOSE 80
