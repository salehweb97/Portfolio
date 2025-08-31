<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PostService
{
    public function __construct(private readonly PostRepositoryInterface $posts)
    {
    }

    public function latest(int $limit = 3): Collection
    {
        return $this->posts->latestPublished($limit);
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->posts->paginatePublished($perPage);
    }

    public function findBySlug(string $slug): ?Post
    {
        return $this->posts->findBySlug($slug);
    }
}


