<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{ProjectRepositoryInterface, EloquentProjectRepository, PostRepositoryInterface, EloquentPostRepository, ContactMessageRepositoryInterface, EloquentContactMessageRepository};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, EloquentProjectRepository::class);
        $this->app->bind(PostRepositoryInterface::class, EloquentPostRepository::class);
        $this->app->bind(ContactMessageRepositoryInterface::class, EloquentContactMessageRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
