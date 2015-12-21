<?php namespace App;

use App\Services\DataHandle;
use App\Services\FavoriteService;
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
    protected $fillable = ['fid', 'uid',  'pid', 'pname', 'ftime'];

    /*
     * 与商品建立一对一的关系
     * */

    public function product(){
        return $this->hasOne('App\Product','pid');
    }
    /*
     * 与订单建立一对一的关系
     * */

    public function past(){
        return $this->hasOne('App\Past','pastid');
    }

    /*
     * 获取与购物车相关联的商品信息
     * */
    public static function getProductList(FavoriteService $favoriteService){
        $products = array();
        $list = $favoriteService->getFavorites();
        foreach($list as $favorite){
            $product = Product::find($favorite->pid);
            $products[$favorite->fid]['product'] = $product;
        }
//        dd($products);
        return $products;
    }

}
