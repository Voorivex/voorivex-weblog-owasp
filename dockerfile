FROM php:8.1

RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get install -y default-mysql-client