<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('configs', function(Blueprint $table)
        {
            $table->increments('cid');
            $table->string('uid',30);//用户id
            $table->string('cname')->unique();//配置名称
            $table->string('cvalue')->unique();//配置值
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('configs');
    }

}
