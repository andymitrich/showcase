FROM php:7.3-fpm-alpine

WORKDIR /var/www

RUN apk add --update-cache gnupg libzip-dev libxml2-dev git shadow $PHPIZE_DEPS

RUN docker-php-ext-install pdo_mysql xml mbstring json zip iconv ctype

COPY ./src /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY --chown=www:www . /var/www

USER www

EXPOSE 9000
CMD ["php-fpm"]
