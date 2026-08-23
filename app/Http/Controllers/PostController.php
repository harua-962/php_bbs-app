<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->latest('created_at')
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        Post::create($validated);

        return to_route('posts.index')->with('status', '投稿を保存しました。');
    }
}
