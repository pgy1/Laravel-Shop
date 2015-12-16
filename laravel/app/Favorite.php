<?php namespace App;

use App\Services\DataHandle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Favorite extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'favorites';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fid', 'pname', 'ftime'];

    /*
     * 与商品表建立一对一的关系
     * */

    public function product(){
        return $this->hasOne('App\Product','pid');
    }

    /**
     * 判断购物车表是否存在数据
     * @param $pid 商品序列号
     * */

    public static function exsitId($pid = null){
        //如果不存在商品序列号，则默认直接读取购物车表的第一条数据
        if(is_null($pid))
            $exsit = DB::table('favorites')->select(DB::raw(1))->first();
        else
            $exsit = DB::table('favorites')->select(DB::raw(1))->where('pid',$pid)->first();
//        dd($exsit);
        if(sizeof($exsit)>0) return true;
        return false;
    }

    /*
     * 获取购物车所有的数据
     * */
    public static function getList(){
        $favorites = array();
        if(Favorite::exsitId()){
            $favorites = DB::table("favorites")->get();
        }
//        dd($favorites);
        return $favorites;
    }

    /*
     * 获取与购物车相关联的商品信息
     * */
    public static function getProductList(){
        $products = array();
        $list = Favorite::getList();
        foreach($list as $favorite){
            $product = Product::find($favorite->pid);
            $products[$favorite->fid]['product'] = $product;
        }
//        dd($products);
        return $products;
    }

}
