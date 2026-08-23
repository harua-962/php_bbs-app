FROM php:8.2-cli

# 必要な拡張機能とツールのインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# 依存関係のインストールと初期設定
RUN composer install --no-dev --optimize-autoloader
RUN touch database/database.sqlite
RUN php artisan key:generate --force
RUN php artisan migrate --force

# 起動コマンド
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}