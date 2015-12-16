<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataHandleProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
        $this->app->bind(
            'App\Services\DataHandle',
            'App\Services\ServiceImpl\DataHandleImpl'
        );
    }
}