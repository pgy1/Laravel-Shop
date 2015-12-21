<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Past extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pasts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pastid', 'pid', 'uid', 'name', 'type', 'price', 'image', 'payway', 'state'];

    public function product(){
        return $this->hasOne('App\Product','pid');
    }

    /**
     * 判断订单是否生成
     * @param $pastid 商品序列号
     * */

    public static function exsitId($uid = null, $pid = null){
        //如果不存在商品序列号，则默认直接读取购物车表的第一条数据
        if(is_null($pid)||is_null($uid))
            $exsit = DB::table('pasts')->select(DB::raw(1))->first();
        else
            $exsit = DB::table('pasts')->select(DB::raw(1))->where('pid',$pid)->where('uid',$uid)->first();
//        dd($exsit);
        if(sizeof($exsit)>0) return true;
        return false;
    }

    public static function getPastByPastId($pastid){

        $pasts = DB::table("pasts")->where("pastid","=",$pastid)->get();

        return $pasts;
    }

    public static function getPastByUPid($uid, $pid){

        $pasts = DB::table("pasts")->where("uid","=",$uid)->where("pid","=",$pid)->get();

        return $pasts;
    }

}
