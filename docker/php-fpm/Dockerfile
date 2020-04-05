FROM php:7.4.3-fpm-buster

RUN apt-get update 
RUN docker-php-ext-install \
  pdo_mysql

WORKDIR /app
