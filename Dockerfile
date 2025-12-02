# ==============================
# 1. Composer Build Stage
# ==============================
FROM composer:2 AS build

WORKDIR /app

# Laravel のソースをコピー
COPY src/ /app

# Composer install (本番用)
RUN composer install --no-dev --optimize-autoloader


# ==============================
# 2. PHP-FPM + Nginx Stage
# ==============================
FROM richarvey/nginx-php-fpm:latest

WORKDIR /app

# build ステージから vendor とソースをコピー
COPY --from=build /app /app

# ★ ★ ★ 本番用 .env を確実にコンテナへコピー ★ ★ ★
COPY src/.env /app/.env

# 権限設定（Laravel 必須）
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# デフォルトの nginx.conf を削除
RUN rm /etc/nginx/sites-enabled/default.conf

# nginx.conf を反映
COPY src/docker/nginx.conf /etc/nginx/conf.d/default.conf

# Laravel 本番モード
ENV APP_ENV=production

RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize
