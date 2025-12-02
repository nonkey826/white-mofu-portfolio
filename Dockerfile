# ---- Build Stage ----
FROM php:8.2-fpm AS build

RUN apt-get update && apt-get install -y \
    zip unzip git curl libonig-dev libxml2-dev

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache


# ---- Production Stage ----
FROM nginx:1.23

COPY --from=build /app /app
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /app
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
