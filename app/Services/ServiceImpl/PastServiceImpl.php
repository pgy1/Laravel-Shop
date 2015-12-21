<?php namespace App\Services\ServiceImpl;

use App\Services\PastService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class PastServiceImpl implements PastService{

    /**
     * 订单数据
     * */
    public function getPasts(){
        //直接获取所有的订单数据
        $pasts = DB::table('pasts')->orderBy("updated_at", 'desc')->get();
        return $pasts;
    }

    /**
     * 订单分页函数
     * @param $page 页数
     * @param $perPage 每页条数
     * */
    public function getPages($page,$perPage = 10){

        //翻页的开始-结束
        $from = $page*$perPage-$perPage;
        $to = $perPage;

        //按更新时间倒序输出
        $totalData = DB::table("pasts")->orderBy("updated_at", "desc")->get();
        $data['pasts'] = DB::table("pasts")->orderBy("updated_at", "desc")
                        ->skip($from)->take($to)->get();
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
        $data['paginator'] = new Paginator($data['pasts'], count($totalData), $page);

        return $data;
    }

    /**
     * 删除订单
     * @param $uid 用户id
     * @param $pid 订单随机号
     * */
    public function delete($uid, $pid)
    {
        // TODO: Implement delete() method.
        $result = DB::table("pasts")
                    ->where("uid",$uid)
                    ->where("pid",$pid)
                    ->delete();
        return $result;
    }
    //清空订单
    public function clear()
    {
        // TODO: Implement delete() method.
        $result = DB::table("pasts")->delete();
        return $result;
    }
}