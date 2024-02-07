<?php

namespace App\Providers;

use App\Models\Repositories\LinksRepository;
use App\Models\Repositories\LinksRepositoryInterface;
use App\Services\Encode;
use App\Services\EncodeInterface;
use App\Services\Transform;
use App\Services\TransformInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LinksRepositoryInterface::class, LinksRepository::class);
        $this->app->bind(EncodeInterface::class, Encode::class);
        $this->app->bind(TransformInterface::class, Transform::class);
    }

    public function boot(): void
    {

    }
}
