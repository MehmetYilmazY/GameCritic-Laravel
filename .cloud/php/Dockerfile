FROM php:8.2-fpm

# Installing dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    default-mysql-client \
    libpq-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    locales \
    zip \
    libxml2-dev \
    libwebp-dev jpegoptim optipng pngquant gifsicle git supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installing extensions
RUN docker-php-ext-install pdo_mysql zip exif pcntl bcmath opcache pdo_pgsql soap
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-webp=/usr/include/
RUN docker-php-ext-install gd

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini

# Installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN nohup php artisan horizon &

USER www-data

CMD ["/usr/bin/supervisord", "-c", "/var/www/supervisord.conf"]

EXPOSE 9010
