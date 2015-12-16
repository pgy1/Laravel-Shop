<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AjaxResponseServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('AjaxResponseService', function () {
            return new \App\Services\AjaxResponse();
        });
    }
}

?>