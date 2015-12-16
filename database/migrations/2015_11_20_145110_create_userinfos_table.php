<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userinfos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('uid')->unique();//用户id
            $table->string('phone',14)->unique();//电话号码
            $table->string('email')->unique();//邮箱
            $table->string('qq',13)->unique();//QQ号码
            $table->text('qcode');//二维码
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
		Schema::drop('userinfos');
	}

}
