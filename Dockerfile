FROM php:8-fpm-alpine

RUN apk add --no-cache freetype icu icu-data-full libjpeg-turbo libpng libwebp libxml2 libzip mysql-client

RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS freetype-dev libjpeg-turbo-dev libpng-dev libwebp-dev libxml2-dev libzip-dev && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install bcmath gd mysqli opcache pdo_mysql soap zip && \
    apk del .build-deps && rm -rf /usr/src/php*

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# npm
RUN apk --no-cache add npm