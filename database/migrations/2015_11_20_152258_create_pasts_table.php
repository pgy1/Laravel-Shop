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
            $table->string('pastid',50)->unique();//订单随机号
            $table->string('pid',30);//商品随机号
            $table->integer('uid');//用户id
            $table->string('type',3);//商品类型
            $table->string('pname');//商品名称
            $table->string('price');//商品价格
            $table->text('image');//商品图片
            $table->text('payway');//交易方式
            $table->string('state',1);//订单当前状态 0-取消订单 1-待处理订单，2-正在处理，3-已处理，关闭订单
            $table->timestamps();


			$table->foreign('pid')
				->references('pid')->on('products')
				->onDelete('cascade');
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
