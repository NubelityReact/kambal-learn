FROM php:7.3-apache

RUN apt-get update && apt-get install -y \
    mariadb-client \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql mysqli

RUN apt-get install -q -y ssmtp mailutils

ARG SMTP_SERVER
ARG SMTP_EMAIL
ARG SMTP_PASSWORD


# root is the person who gets all mail for userids 
RUN echo "root=${SMTP_EMAIL}" >> /etc/ssmtp/ssmtp.conf

# Here is the gmail configuration (or change it to your private smtp server)
RUN echo "mailhub=${SMTP_SERVER}" >> /etc/ssmtp/ssmtp.conf
RUN echo "AuthUser=${SMTP_EMAIL}" >> /etc/ssmtp/ssmtp.conf
RUN echo "AuthPass=${SMTP_PASSWORD}" >> /etc/ssmtp/ssmtp.conf

RUN echo "UseTLS=YES" >> /etc/ssmtp/ssmtp.conf
RUN echo "UseSTARTTLS=YES" >> /etc/ssmtp/ssmtp.conf


# Set up php sendmail config
RUN echo "sendmail_path=sendmail -i -t" >> /usr/local/etc/php/conf.d/php-sendmail.ini

RUN a2enmod rewrite

RUN mkdir /var/www/html/control-escolar

WORKDIR /var/www/html/control-escolar

COPY ./src .

# RUN chown -R www-data:www-data /var/www/html

EXPOSE 80