# ==============================
# 1. Composer Build Stage
# ==============================
FROM composer:2 AS build

WORKDIR /app

# Laravel の全ファイルをコピー
COPY src/ /app

# 依存関係をインストール（本番用）
RUN composer install --no-dev --optimize-autoloader

# ==============================
# 2. PHP-FPM + Nginx Stage
# ==============================
FROM richarvey/nginx-php-fpm:latest

WORKDIR /app

# build ステージから Laravel 全体をコピー
COPY --from=build /app /app

# ストレージ・キャッシュの権限調整
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# デフォルトの nginx.conf を削除
RUN rm /etc/nginx/sites-enabled/default.conf || true

# ★ あなたのリポジトリ構成に合わせた「正しいパス」
COPY nginx.conf /etc/nginx/conf.d/default.conf


# 本番設定
ENV APP_ENV=production

# Laravel キャッシュクリア & 最適化
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize
