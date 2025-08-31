<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function latestPublished(int $limit = 3): Collection
    {
        return Post::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    public function paginatePublished(int $perPage = 10): LengthAwarePaginator
    {
        return Post::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Post
    {
        return Post::query()->where('slug', $slug)->first();
    }
}


