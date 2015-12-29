<?php namespace App;

use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pid', 'uid', 'name', 'type', 'description', 'price', 'image', 'images', 'payway', 'deadline'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];


    public function favorite(){
        return $this->belongsTo('App\Favorite','pid');
    }

    public function user(){
        return $this->belongsTo('App\User','id');
    }

    public function past(){
        return $this->belongsTo('App\Past','pastid');
    }

    public static function getProductById($pid){

        $products = DB::table("products")->where("pid","=",$pid)->get();

        return $products;
    }

    public static function getProducts(){

        $products = DB::table("products")->where("name","like","%%")->get();

        return $products;
    }

    public static function getFavoriteList(ProductService $productService){

        $favorites = array();
        $list = $productService->getProducts();

        foreach($list as $product){
            $favorite = Favorite::find($product->pid);
            if(isset($favorite))
                $favorites[$product->fid]['favorite'] = $favorite;
        }
//        dd($favorites);
        return $favorites;
    }

}
