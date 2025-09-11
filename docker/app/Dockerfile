FROM php:8.4-fpm as php

RUN apt-get update -y \
    && apt-get install -y unzip libpq-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && pecl install -o -f redis \
    && rm -fr /tmp/pear \
    && docker-php-ext-enable redis

RUN groupadd -g 1000 www \
    && useradd -u 1000 -ms /bin/bash -g www www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www
COPY . /var/www

RUN chown -R www:www /var/www

COPY --chown=www:www docker/app/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
