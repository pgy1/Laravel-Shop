<?php namespace App\Services;

interface DataHandle{

    /**
     * 判断Array是否为空
     * @param $obj 对象
     * @Return true或false
     * */
    public function ArrayNotNull($obj);

    /**
     * 判断String是否为空
     * @param $str 字符串
     * @Return true或false
     * */
    public function StringNotNull($str);

}
