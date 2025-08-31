<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Services\ProjectService;
use Illuminate\Http\Response as HttpResponse;

class SitemapController extends Controller
{
    public function __construct(
        private readonly ProjectService $projects,
        private readonly PostService $posts,
    ) {
    }

    public function index(): HttpResponse
    {
        $urls = [
            url('en'),
            url('fa'),
        ];

        foreach ($this->projects->paginate(1000)->items() as $p) {
            $urls[] = url('en/projects/'.$p->slug);
            $urls[] = url('fa/projects/'.$p->slug);
        }
        foreach ($this->posts->paginate(1000)->items() as $p) {
            $urls[] = url('en/blog/'.$p->slug);
            $urls[] = url('fa/blog/'.$p->slug);
        }

        $xml = view('sitemap.xml', compact('urls'))->render();
        return new HttpResponse($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}


