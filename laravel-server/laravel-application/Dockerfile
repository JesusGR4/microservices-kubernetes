FROM composer:1.9.0 as composer
ARG VENDOR_DIR
ENV VENDOR_DIR $VENDOR_DIR
RUN mkdir -p /var/www/html && mkdir -p ${VENDOR_DIR}
WORKDIR /var/www/html
COPY . ./
RUN yes | composer install
VOLUME $VENDOR_DIR

FROM php:7.2-fpm
ARG VENDOR_DIR
ENV VENDOR_DIR $VENDOR_DIR
ENV COMPOSER_HOME=/root/.composer

RUN mkdir -p ${VENDOR_DIR} && apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    telnet \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl && mkdir -p $COMPOSER_HOME \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

COPY . /var/www/html
COPY --from=composer ${VENDOR_DIR} ${VENDOR_DIR}
WORKDIR /var/www/html
RUN composer dump-autoload && chown -R www-data:www-data /var/www/html
EXPOSE 9000
