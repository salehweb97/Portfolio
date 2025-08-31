<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function __construct(private readonly ProjectService $projects)
    {
    }

    public function show(Request $request, string $locale, string $slug): Response
    {
        $project = $this->projects->findBySlug($slug);
        abort_unless((bool) $project, 404);

        $meta = [
            'title' => $project->title,
            'description' => $project->summary,
        ];

        return Inertia::render('Projects/Show', [
            'project' => $project,
            'meta' => $meta,
        ]);
    }
}


