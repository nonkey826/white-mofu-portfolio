# ------------------------------------------------------------
# 1. Composer Install
# ------------------------------------------------------------
FROM composer:2 AS composer

WORKDIR /app

COPY . /app

RUN composer install --no-dev --optimize-autoloader


# ------------------------------------------------------------
# 2. PHP + Nginx コンテナ
# ------------------------------------------------------------
FROM richarvey/nginx-php-fpm:latest

WORKDIR /app

COPY --from=composer /app /app

RUN chown -R nginx:nginx /app/storage /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache

RUN rm /etc/nginx/sites-enabled/default.conf

COPY docker/nginx.conf /etc/nginx/sites-enabled/default.conf

ENV APP_ENV=production
