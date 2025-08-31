<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EloquentProjectRepository implements ProjectRepositoryInterface
{
    public function featured(int $limit = 3): Collection
    {
        return Project::query()
            ->whereNotNull('published_at')
            ->orderBy('order')
            ->latest('published_at')
            ->with('media')
            ->limit($limit)
            ->get();
    }

    public function paginatePublished(int $perPage = 9): LengthAwarePaginator
    {
        return Project::query()
            ->whereNotNull('published_at')
            ->orderBy('order')
            ->latest('published_at')
            ->with('media')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Project
    {
        return Project::query()->where('slug', $slug)->with('media')->first();
    }
}


