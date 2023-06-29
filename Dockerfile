FROM php:8.1-apache

WORKDIR /app

COPY . /app

RUN apt-get update && apt-get install -y unzip
RUN docker-php-ext-install mysqli pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chown -R www-data:www-data /app/storage

RUN a2enmod rewrite

COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

CMD ["apache2-foreground"]