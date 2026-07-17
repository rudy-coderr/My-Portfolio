FROM php:8.3-cli

WORKDIR /var/www/html

COPY . .

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    openssl \
    ca-certificates

RUN update-ca-certificates

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000

CMD php artisan optimize:clear && php artisan config:cache && php artisan serve --host=0.0.0.0 --port=10000