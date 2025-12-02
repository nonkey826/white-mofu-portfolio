# ==============================
# 1. Composer Build Stage
# ==============================
FROM composer:2 AS build

WORKDIR /app

COPY src/ /app

RUN composer install --no-dev --optimize-autoloader


# ==============================
# 2. PHP-FPM + Nginx Stage
# ==============================
FROM richarvey/nginx-php-fpm:latest

WORKDIR /app

COPY --from=build /app /app

RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

RUN rm /etc/nginx/sites-enabled/default.conf || true

COPY src/docker/nginx.conf /etc/nginx/conf.d/default.conf

ENV APP_ENV=production

RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize
