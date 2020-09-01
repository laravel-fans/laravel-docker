FROM php:7.4-apache

WORKDIR /var/www/laravel

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \
    && apt-get install -y \
    cron \
    icu-devtools \
    jq \
    libfreetype6-dev libicu-dev libjpeg62-turbo-dev libpng-dev libsasl2-dev libssl-dev libwebp-dev libxpm-dev libzip-dev \
    unzip \
    zlib1g-dev
RUN apt-get clean \
    && apt-get autoclean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    && yes '' | pecl install redis \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install gd intl pdo_mysql zip \
    && docker-php-ext-enable opcache redis

COPY composer.json composer.lock ./
RUN composer install --no-autoloader --no-scripts --no-dev

COPY docker/ /
RUN a2enmod rewrite headers \
    && a2ensite laravel \
    && a2dissite 000-default

COPY . /var/www/laravel
RUN composer install --optimize-autoloader --no-dev

RUN touch database/database.sqlite
RUN chown www-data:www-data bootstrap/cache \
    && chown -R www-data:www-data storage/ \
    && chmod +x /usr/local/bin/docker-laravel-entrypoint

CMD ["docker-laravel-entrypoint"]
