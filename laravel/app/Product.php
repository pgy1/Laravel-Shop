<?php namespace App;

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
    protected $fillable = ['pid', 'name', 'type', 'description', 'price', 'images', 'payway', 'deadline'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function favorite(){
        return $this->belongsTo('App\Favorite','fid');
    }

    public function user(){
        return $this->belongsTo('App\User','id');
    }

    public static function getProducts(){

        $products = DB::table("products")->where("name","like","%%")->get();

        return $products;
    }

}
