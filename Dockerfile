FROM php:8.1-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
  git unzip \
  && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY ./src /var/www

RUN composer install --no-dev --optimize-autoloader

EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]

RUN php artisan config:clear \
  && php artisan route:clear \
  && php artisan view:clear \
  && php artisan cache:clear
