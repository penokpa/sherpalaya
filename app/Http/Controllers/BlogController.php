<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request, string $locale)
    {
        $featured = Post::published()
            ->where('is_featured', true)
            ->orderByDesc('published_at')
            ->with('coverImage')
            ->first();

        $posts = Post::published()
            ->when($featured, fn ($q) => $q->where('id', '!=', $featured->id))
            ->orderByDesc('published_at')
            ->with('coverImage')
            ->paginate(9)
            ->withQueryString();

        return view('website.blog.index', [
            'featured' => $featured,
            'posts'    => $posts,
        ]);
    }

    public function show(Request $request, string $locale, string $slug)
    {
        $post = Post::published()
            ->with('coverImage')
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->with('coverImage')
            ->limit(3)
            ->get();

        return view('website.blog.show', [
            'post'    => $post,
            'related' => $related,
        ]);
    }
}
