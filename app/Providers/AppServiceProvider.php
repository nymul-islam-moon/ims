<?php

namespace App\Providers;

use App\Service\CodeGenerationService;
use Illuminate\Support\ServiceProvider;
use App\Interface\CodeGenerationServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(CodeGenerationServiceInterface::class, CodeGenerationService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
