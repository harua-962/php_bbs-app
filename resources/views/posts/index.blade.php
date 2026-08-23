<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel ひとこと掲示板</title>
    <style>
        body {
            font-family: "Helvetica Neue", Arial, "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif;
            max-width: 720px;
            margin: 2rem auto;
            padding: 0 1rem;
            line-height: 1.6;
        }
        form, .post {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        input, textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 0.5rem;
            margin-top: 0.25rem;
        }
        button {
            margin-top: 0.75rem;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }
        .error {
            color: #b00020;
            margin: 0.25rem 0;
        }
        .status {
            color: #0b7a2f;
            margin: 0.5rem 0 1rem;
        }
        .meta {
            color: #666;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <h1>Laravel ひとこと掲示板</h1>

    @if (session('status'))
        <p class="status">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label for="name">名前</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" maxlength="50" required>
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <label for="message">ひとこと</label>
        <textarea id="message" name="message" rows="3" maxlength="255" required>{{ old('message') }}</textarea>
        @error('message')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">投稿する</button>
    </form>

    <h2>投稿一覧</h2>

    @forelse ($posts as $post)
        <article class="post">
            <p><strong>{{ $post->name }}</strong></p>
            <p>{{ $post->message }}</p>
            <p class="meta">{{ $post->created_at->format('Y-m-d H:i') }}</p>
        </article>
    @empty
        <p>まだ投稿はありません。</p>
    @endforelse
</body>
</html>
