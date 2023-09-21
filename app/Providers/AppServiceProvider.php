<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public const HOME = '/curso';
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositories\Contracts\CursoRepositoryInterface',
            'App\Repositories\CursoRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\AlunoCursoRepositoryInterface',
            'App\Repositories\AlunoCursoRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\AlunoRepositoryInterface',
            'App\Repositories\AlunoRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
