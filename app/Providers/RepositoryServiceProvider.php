<?php

namespace App\Providers;

use App\Core\Pictures\Repositories\Interfaces\PictureRepositoryInterface;
use App\Core\Pictures\Repositories\PictureRepository;
use App\Core\SpareParts\Repositories\Interfaces\SparePartRepositoryInterface;
use App\Core\SpareParts\Repositories\SparePartRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array $models
     */
    protected $models =
    [
        [SparePartRepositoryInterface::class, SparePartRepository::class],
        [PictureRepositoryInterface::class, PictureRepository::class],
    ];

    /**
     * Function to bind the repositories
     */
    public function bindRepositories(): void
    {
        foreach ($this->models as $model) {
            $this->app->bind($model[0], $model[1]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();
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
