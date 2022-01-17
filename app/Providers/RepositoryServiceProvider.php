<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AboutRepositoryInterface;
use App\Repositories\AboutRepository;

use App\Interfaces\EventRepositoryInterface;
use App\Repositories\EventRepository;

use App\Interfaces\TestimonyRepositoryInterface;
use App\Repositories\TestimonyRepository;

use App\Interfaces\DetailRepositoryInterface;
use App\Repositories\DetailRepository;

use App\Interfaces\ServiceRepositoryInterface;
use App\Repositories\ServiceRepositorys;

use App\Interfaces\StatisticRepositoryInterface;
use App\Repositories\StatisticRepositorys;



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
    $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    $this->app->bind(TestimonyRepositoryInterface::class, TestimonyRepository::class);
    $this->app->bind(DetailRepositoryInterface::class, DetailRepository::class);
    $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
    $this->app->bind(StatisticRepositoryInterface::class, StatisticRepository::class);



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
