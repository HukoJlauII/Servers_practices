FROM php:7.2-apache
RUN apt-get update
RUN docker-php-ext-install mysqli