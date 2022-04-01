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
use App\Repositories\ServiceRepository;

use App\Interfaces\StatsRepositoryInterface;
use App\Repositories\StatsRepository;

use App\Interfaces\ItemRepositoryInterface;
use App\Repositories\ItemRepository;

use App\Interfaces\SpeakerRepositoryInterface;
use App\Repositories\SpeakerRepository;

use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;


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
    $this->app->bind(StatsRepositoryInterface::class, StatsRepository::class);
    $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    $this->app->bind(SpeakerRepositoryInterface::class, SpeakerRepository::class);
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
