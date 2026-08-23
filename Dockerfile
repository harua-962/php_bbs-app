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

# 依存関係のインストール
RUN composer install --no-dev --optimize-autoloader

# .env作成・キー生成・DB準備・マイグレーション・起動
CMD cp -n .env.example .env && \
    touch database/database.sqlite && \
    php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8000}