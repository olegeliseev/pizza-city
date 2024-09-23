FROM php:8.2-fpm

RUN apt-get -y update && apt-get -y upgrade

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY docker/php/conf.d/* $PHP_INI_DIR/conf.d/

WORKDIR /var/www/public

RUN chown -R www-data:www-data /var/www

CMD [ "php-fpm" ]
