<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.

        $services = [
            'App\Services\FavoriteService'=>'App\Services\ServiceImpl\FavoriteServiceImpl',
            'App\Services\ProductService'=>'App\Services\ServiceImpl\ProductServiceImpl'
        ];

        foreach($services as $service=>$serviceImpl){
            $this->app->bind($service,$serviceImpl);
        }

    }
}