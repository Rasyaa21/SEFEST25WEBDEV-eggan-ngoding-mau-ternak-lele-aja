<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RekomChatRepository;
use App\Interfaces\RekomChatRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RekomChatRepositoryInterface::class, RekomChatRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
