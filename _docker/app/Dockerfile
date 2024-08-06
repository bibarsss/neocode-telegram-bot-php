FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git \
      curl \
      gnupg \
      libicu-dev \
      g++ \
      build-essential \
      libjpeg-dev \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libmcrypt-dev \
      libgd-dev \
      jpegoptim optipng pngquant gifsicle \
      libonig-dev \
      libxml2-dev \
      && docker-php-ext-install pdo pdo_pgsql mbstring \
      && docker-php-ext-install bcmath \
      && docker-php-ext-install gd \
      && docker-php-ext-install zip \
      && docker-php-ext-install intl \
      && apt-get clean \
      && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
      apt-get clean && rm -rf /var/lib/apt/lists/* \

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app