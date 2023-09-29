FROM php:8.2-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
