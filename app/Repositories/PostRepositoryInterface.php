<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function latestPublished(int $limit = 3): Collection;
    public function paginatePublished(int $perPage = 10): LengthAwarePaginator;
    public function findBySlug(string $slug): ?Post;
}


