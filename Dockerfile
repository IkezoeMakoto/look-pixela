FROM php:7.2-apache

RUN apt-get update && \
    apt-get install -y vim make curl

# rewrite module 有効化
RUN a2enmod rewrite auth_basic setenvif

# imagick
RUN apt-get update && apt-get install -y \
        libmagickwand-dev --no-install-recommends
RUN pecl install imagick && docker-php-ext-enable imagick

COPY ./conf/security.conf /etc/apache2/conf-available/security.conf
COPY ./conf/000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./src /var/www/html
