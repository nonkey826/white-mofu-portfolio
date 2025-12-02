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

# 権限設定
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# default nginx.conf 削除
RUN rm /etc/nginx/sites-enabled/default.conf

# ← ← ← ここ！！この位置が正しい！
COPY src/nginx.conf /etc/nginx/conf.d/default.conf

# 環境モード
ENV APP_ENV=production

# キャッシュクリア
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize
