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
useApp\Repositories\DetailRepository;



class RepositoryServiceProvider extends ServiceProvider
{
    private $detailRepository;

    public function __construct(DetailRepositoryInterface $detailRepository)
    {
        $this->$detailRepository = $detailRepository;
    }

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
