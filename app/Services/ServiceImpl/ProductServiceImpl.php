<?php namespace App\Services\ServiceImpl;

use App\Favorite;
use App\Services\ProductService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProductServiceImpl implements ProductService{

    /**
     * 商品数据
     *
     * */
    public function getProducts(){
        //直接获取所有的商品数据

    }

    /**
     * 商品分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */
    public function getPages($page,$perPage = 10){

        //翻页的开始-结束
        $from = $page*$perPage-$perPage;
        $to = $perPage;

        //按更新时间倒序输出
        $sql = " select t.* from products t order by t.updated_at desc ";
        $totalData = DB::select( DB::raw($sql));//计算符合条件的所有数据
        $data['products'] = DB::select( DB::raw($sql.' limit '.$from.','.$to));//单页数据
        $data['products'] = Favorite::getProductList();//获取商品相关联的商品表数据
        $data['page']['total'] = count($totalData);//计算数据总条数

        $availible = ceil((count($totalData)/$perPage));//计算数据可分的总页数
        $last = $page;
        //当前页页码大于1的时候，才能-1
        if($page>1)
            $last = $page-1;//计算上一页的页码
        $data['page']['last'] = $last;
        $next = $page+1;//计算下一页的页码
        if($next <= $availible)
            $data['page']['next'] = $page+1;//如果下一页的页码小于或等于可分的总页数，下一页的页码+1
        //把数据存入翻页类中
        $data['paginator'] = new Paginator($data['products'], count($totalData), $page);
//        dd($data);

        return $data;
    }

}