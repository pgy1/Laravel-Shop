<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('pid',30)->unique();//商品随机号
            $table->string('uid',30);//用户id
            $table->string('name',80);//商品名称
            $table->string('type',3);//商品类型
            $table->text('description');//商品描述
            $table->integer('price');//商品价格
            $table->string('image',200);//单独显示的图片
            $table->text('images');//商品图片
            $table->text('payway');//交易方式
            $table->string('deadline',14);//到期时间
            $table->rememberToken();
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
		Schema::drop('products');
	}

}
