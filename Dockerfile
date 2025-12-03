# ==============================
# 1. Composer Build Stage
# ==============================
FROM composer:2 AS build

WORKDIR /app

# Laravel の全ファイルをコピー
COPY ./ /app

# 依存関係をインストール
RUN composer install --no-dev --optimize-autoloader

# ==============================
# 2. PHP-FPM + Nginx Stage
# ==============================
FROM richarvey/nginx-php-fpm:latest

WORKDIR /app

# build ステージから Laravel をコピー
COPY --from=build /app /app

# 権限設定
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# デフォルト削除
RUN rm /etc/nginx/sites-enabled/default.conf || true

# ★ ここが重要（あなたのパスに合わせた正しい COPY）
COPY nginx.conf /etc/nginx/conf.d/default.conf

# 本番設定
ENV APP_ENV=production

RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize
