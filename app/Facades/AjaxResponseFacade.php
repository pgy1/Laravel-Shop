<?php namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AjaxResponseFacade extends Facade {

    protected static function getFacadeAccessor() { return 'AjaxResponseService'; }

}