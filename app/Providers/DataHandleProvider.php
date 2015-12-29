<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataHandleProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('DataHandle', function () {
            return new \App\Services\DataHandle();
        });
    }
}

?>