<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Service;

class PostController extends Controller
{
    /**
     * Danh sách bài viết theo category
     */
    public function index(string $categorySlug)
    {
        $posts = Post::query()
            ->with('category')
            ->where('status', 1)
            ->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })
            ->select([
                'id',
                'title',
                'slug',
                'image',
                'summary',
                'created_at'
            ])
            ->latest()
            ->limit(4)
            ->get();

        return response()->json([
            'data' => $posts,
        ]);
    }

    /**
     * Chi tiết bài viết
     */
    public function show(string $slug)
    {
        $post = Post::query()
            ->with('category')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return response()->json([
            'data' => $post,
        ]);
    }

    public function servicePosts(string $slug)
    {
        $service = Service::where('slug', $slug)
            ->firstOrFail();

        $posts = Post::where('service_id', $service->id)
            ->latest()
            ->select([
                'id',
                'title',
                'slug',
                'image',
                'summary',
                'created_at'
            ])
            ->limit(4)
            ->get();

        return response()->json([
            'posts' => $posts
        ]);
    }
}
