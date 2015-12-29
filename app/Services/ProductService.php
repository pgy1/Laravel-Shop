<?php namespace App\Services;


use App\Product;

interface ProductService {

    /**
     * 更新收藏标识
     * @param $pid 商品随机号
     * @param $flag 收藏标识
     * */

    public function updateFavoriteFlag($pid, $flag);

    /**
     * 新增商品信息
     * @param $product 商品信息
     * */

    public function saveProduct(Product $product);

    /**
     * 更新商品信息
     * @param $product 商品信息
     * */

    public function updateProduct(Product $product);

    /**
     * 获取收藏随机号
     * @param $uid 用户id
     * @param $pid 商品随机号
     * */

    public function getFidByUPid($uid, $pid);

    /**
     * 单个用户的商品数据
     * */

    public function getProductsByUser();

    /**
     * 根据关键词搜索的商品数据
     * */

    //单个关键词
    public function getProductsByKey($key);
    //多关键词
    public function getProductsByMoreKey($keyArray);

    /**
     * 商品数据
     * @param $pid 商品随机号
     * */

    public function getProductById($pid);

    /**
     * 所有商品数据
     * */

    public function getProducts();

    /**
     * 商品分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */

    public function getPages($page,$perPage = 10);

    /**
     * 单个用户的商品分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */

    public function getPagesByUser($page,$perPage = 10);

}
