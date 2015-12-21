<?php namespace App\Services;


interface PastService {
    /**
     * 获取所有的订单数据
     * */
    public function getPasts();
    /**
     * 订单分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */
    public function getPages($page,$perPage = 10);
    /**
     * 删除订单
     * @param $uid 用户id
     * @param $pid 订单随机号
     * */
    public function delete($uid, $pastid);
    //清空订单
    public function clear();
}