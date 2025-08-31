<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    public function __construct(private readonly PostService $posts)
    {
    }

    public function index(): Response
    {
        return Inertia::render('Blog/Index', [
            'posts' => $this->posts->paginate(10),
            'meta' => [
                'title' => 'Blog',
            ],
        ]);
    }

    public function show(string $locale, string $slug): Response
    {
        $post = $this->posts->findBySlug($slug);
        abort_unless((bool) $post, 404);

        return Inertia::render('Blog/Show', [
            'post' => $post,
            'meta' => [
                'title' => $post->title,
                'description' => $post->excerpt,
            ],
        ]);
    }
}


