<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favorites', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fid',30)->unique();//收藏随机号
            $table->integer('uid');//用户id
            $table->string('pid',30);//商品随机号
            $table->string('ftime',14);//收藏时间
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
		Schema::drop('favorites');
	}

}
