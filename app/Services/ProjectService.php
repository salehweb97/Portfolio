<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\ProjectRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProjectService
{
    public function __construct(private readonly ProjectRepositoryInterface $projects)
    {
    }

    public function featured(int $limit = 3): Collection
    {
        return $this->projects->featured($limit);
    }

    public function paginate(int $perPage = 9): LengthAwarePaginator
    {
        return $this->projects->paginatePublished($perPage);
    }

    public function findBySlug(string $slug): ?Project
    {
        return $this->projects->findBySlug($slug);
    }
}


