<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotDiceUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dice_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('dice_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('dice_id')->references('id')->on('dices')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('dice_user');
	}

}
