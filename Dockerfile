FROM php:8.2-cli

# 必要なパッケージとPHP拡張をインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# 依存関係のインストール（Composerのみ実行）
RUN composer install --no-dev --optimize-autoloader

# 起動スクリプト：起動時にDB作成・マイグレーション・サーバー起動を行う
CMD touch database/database.sqlite && \
    php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8000}