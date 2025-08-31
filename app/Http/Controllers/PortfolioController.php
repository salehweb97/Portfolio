<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Services\ProjectService;
use Inertia\Inertia;
use Inertia\Response;

class PortfolioController extends Controller
{
    public function __construct(
        private readonly ProjectService $projects,
        private readonly PostService $posts,
    ) {
    }

    public function index(): Response
    {
        $featured = $this->projects->featured(3);
        $latestPosts = $this->posts->latest(3);

        $meta = [
            'title' => __('app.name'),
            'description' => __('hero.subtitle'),
        ];

        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => 'John Doe',
            'jobTitle' => 'Full-Stack Laravel Developer',
            'url' => url('/'),
        ];

        return Inertia::render('Welcome', [
            'featuredProjects' => $featured,
            'latestPosts' => $latestPosts,
            'meta' => $meta,
            'jsonLd' => $jsonLd,
        ]);
    }
}


