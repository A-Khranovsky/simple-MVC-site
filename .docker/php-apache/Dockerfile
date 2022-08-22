FROM php:8.0.11-apache

COPY ./../../ /var/www/html

COPY ./../../.docker/php-apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update

RUN apt-get install redis-server -y

RUN cd ~
RUN apt update
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN apt-get install git -y

RUN a2enmod rewrite
