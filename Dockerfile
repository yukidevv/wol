FROM php:7.4-apache

RUN apt-get update && apt-get install -y iputils-ping net-tools /
docker-php-ext-install sockets

EXPOSE 80

WORKDIR /var/www/html
