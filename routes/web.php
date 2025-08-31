<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;

Route::pattern('locale', 'en|fa');

Route::get('/', function () {
    return redirect()->route('home', ['locale' => app()->getLocale()]);
});

Route::group(['prefix' => '{locale}'], function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('home');

    Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::post('/contact', [ContactController::class, 'store'])
        ->middleware(['throttle:6,1'])
        ->name('contact.store');
});

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
