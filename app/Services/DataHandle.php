<?php namespace App\Services;
/**
 * Created by PhpStorm.
 * User: pengguangyu
 * Date: 2015/12/22
 * Time: 11:09
 */

class DataHandle{

    public function arrayNotNull($array){
        if(sizeof($array)>0)
            return true;
        return false;
    }

}
