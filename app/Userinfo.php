<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userinfos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['phone', 'email', 'qq', 'qcode'];


}
