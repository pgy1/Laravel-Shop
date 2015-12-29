<?php namespace App\Services;


interface FavoriteService {

    /**
     * 判断表中是否存在记录
     * @return boolen
     * */

    public function exsitObj();

    /**
     * 根据购物车id，判断表中是否存在该记录
     * @param $fid 购物车编号
     * @return boolen
     * */

    public function exsitObjById($fid);

    /**
     * 判断表中是否存在该记录
     * @param $uid 用户id
     * @param $pid 商品随机号
     * @return boolen
     * */

    public function exsitObjByUPid($uid, $pid);

    /**
     * 获取购物车记录的商品随机号
     * @param $fid 购物车id
     * */

    public function getPidByFid($fid);

    /**
     * 获取购物车的随机号
     * @param $pid 商品随机号
     * @param $uid 用户id
     * */

    public function getFidByPid($pid);
    public function getFidByUPid($uid,$pid);

    /**
     * 获取购物车所有的数据
     * */

    public function getFavorites();

    /**
     * 获取单个购物车信息
     * @param $fid 购物车编号
     * */

    public function getFavoriteById($fid);

    /**
     * 获取单个用户的购物车信息
     * */

    public function getFavoritesByUser();

    /**
     * 购物车分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */

    public function getPages($page,$perPage = 10);

    /**
     * 单个用户购物车分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */

    public function getPagesByUser($page,$perPage = 10);
}
