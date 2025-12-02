# ==============================
# 1. Composer Build Stage
# ==============================
FROM composer:2 AS build

WORKDIR /app

# Laravel のソースコードをコピー
COPY src/ /app

# 本番用の Composer install
RUN composer install --no-dev --optimize-autoloader


# ==============================
# 2. PHP-FPM + Nginx Stage
# ==============================
FROM richarvey/nginx-php-fpm:latest

WORKDIR /app

# build ステージからコピー
COPY --from=build /app /app

# 必須ディレクトリ権限
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# デフォルト nginx.conf 削除
RUN rm /etc/nginx/sites-enabled/default.conf || true

# ★ これが一番重要
# GitHub の構造:
#   white-mofu-portfolio/
#     ┣ Dockerfile ←ここ
#     ┣ src/nginx.conf ←ここ
COPY src/nginx.conf /etc/nginx/conf.d/default.conf

# Laravel 本番モード
ENV APP_ENV=production

# キャッシュクリア & 最適化
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize
