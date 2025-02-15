<?php

namespace App\Providers;

use App\Interfaces\PondRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RekomChatRepository;
use App\Interfaces\RekomChatRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\PondRepository;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RekomChatRepositoryInterface::class, RekomChatRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PondRepositoryInterface::class, PondRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
