<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pasts', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('pid',30)->unique();//商品随机号
            $table->string('type',3);//商品名称
            $table->string('pname');//商品名称
            $table->string('price');//商品价格
            $table->text('image');//商品图片
            $table->text('payway');//交易方式
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
		Schema::drop('pasts');
	}

}
