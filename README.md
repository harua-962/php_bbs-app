# Laravel ひとこと掲示板

フレームワーク（Laravel）を使用して作成した、投稿と一覧表示ができるシンプルなサーバーサイドWebアプリです。

## 提出用URL
- 本番URL: `（デプロイ後にここへURLを記載）`

## 機能
- 名前とひとことメッセージの投稿
- 投稿内容のバリデーション（必須・文字数）
- 投稿一覧の新着順表示
- Bladeの自動エスケープによるXSS対策

## 使用技術
- PHP 8.2+
- Laravel 12
- SQLite（デフォルト設定）

## ローカル起動手順
1. 依存パッケージをインストール
   ```bash
   composer install
   ```
2. 環境変数ファイルを作成
   ```bash
   cp .env.example .env
   ```
3. アプリキーを生成
   ```bash
   php artisan key:generate
   ```
4. SQLiteファイルを作成
   ```bash
   touch database/database.sqlite
   ```
5. マイグレーション実行
   ```bash
   php artisan migrate
   ```
6. 開発サーバー起動
   ```bash
   php artisan serve
   ```
7. ブラウザで `http://127.0.0.1:8000` にアクセス

## デプロイ（例）
Render / Railway などにデプロイし、公開URLを「提出用URL」に記載してください。
