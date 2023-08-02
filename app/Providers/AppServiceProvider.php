<?php

namespace App\Providers;

use App\Http\Interfaces\ProjectInterface;
use App\Http\Interfaces\ProjectMediaInterface;
use App\Http\Interfaces\Repositories\ClientInterface;
use App\Http\Interfaces\Repositories\ClientRepositoryInterface;
use App\Http\Interfaces\Repositories\ProjectRepositoryInterface;
use App\Http\Interfaces\Repositories\TaskRepositoryInterface;
use App\Http\Interfaces\Repositories\UserRepositoryInterface;
use App\Http\Interfaces\TaskInterface;
use App\Http\Interfaces\TaskMediaInterface;
use App\Http\Repositories\ClientRepository;
use App\Http\Repositories\ProjectRepository;
use App\Http\Repositories\TaskRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Services\ClientService;
use App\Http\Services\ProjectMediaService;
use App\Http\Services\ProjectService;
use App\Http\Services\TaskMediaService;
use App\Http\Services\TaskService;
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
        $this->app->bind(ProjectInterface::class, ProjectService::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaskInterface::class, TaskService::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(ClientInterface::class, ClientService::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    }
}
