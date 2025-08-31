<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    public function featured(int $limit = 3): Collection;
    public function paginatePublished(int $perPage = 9): LengthAwarePaginator;
    public function findBySlug(string $slug): ?Project;
}


