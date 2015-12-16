<?php namespace App\Services\ServiceImpl;

use App\Services\DataHandle;

class DataHandleImpl implements DataHandle{

    /**
     * 判断object是否为空
     * @param $obj 对象
     * @Return true或false
     * */
    public function ArrayNotNull($obj)
    {
        // TODO: Implement ObjectNotNull() method.
        if(sizeof($obj) > 0){
            return true;
        }

        return false;

    }

    /**
     * 判断字符串是否为空
     * @param $str 字符串
     * @Return true或false
     * */
    public function StringNotNull($str)
    {
        // TODO: Implement StringNotNull() method.
        if(strlen($str) > 0){
            return true;
        }

        return false;

    }
}