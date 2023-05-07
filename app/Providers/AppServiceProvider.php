<?php

namespace App\Providers;

use App\Http\Interfaces\ProjectMediaInterface;
use App\Http\Interfaces\TaskMediaInterface;
use App\Http\Services\ProjectMediaService;
use App\Http\Services\TaskMediaService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ProjectMediaInterface::class, ProjectMediaService::class);
        $this->app->bind(TaskMediaInterface::class, TaskMediaService::class);
    }
}
