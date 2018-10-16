FROM php:7.2-apache

RUN apt-get update && \
    apt-get install -y vim make curl

# rewrite module 有効化
RUN a2enmod rewrite auth_basic setenvif

COPY ./conf /etc/apache2/sites-enabled
COPY ./src /var/www/html