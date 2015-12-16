<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['pid', 'name', 'type', 'price', 'image', 'payway'];

}
