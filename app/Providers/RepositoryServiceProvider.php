<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AboutRepositoryInterface;
use App\Repositories\AboutRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() 
{
    $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
 }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
