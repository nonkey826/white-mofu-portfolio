# ==============================
# 1. Composer Build Stage
# ==============================
FROM composer:2 AS build

WORKDIR /app

# Laravel の全ファイルをコピー
COPY src/ /app

# 依存関係インストール
RUN composer install --no-dev --optimize-autoloader


# ==============================
# 2. PHP-FPM + Nginx Stage
# ==============================
FROM richarvey/nginx-php-fpm:latest

WORKDIR /app

# build ステージの成果物をコピー
COPY --from=build /app /app

# 権限設定
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# デフォルト nginx.conf 消す
RUN rm /etc/nginx/sites-enabled/default.conf || true

# ⭐ 完全に正しいパス
COPY src/docker/nginx.conf /etc/nginx/conf.d/default.conf

ENV APP_ENV=production

# Laravel キャッシュクリア
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize
