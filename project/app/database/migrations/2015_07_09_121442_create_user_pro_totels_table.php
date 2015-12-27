<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProTotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_pro_totels', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('ac_num');
            $table->integer('totel_num');
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
		Schema::drop('user_pro_totels');
	}

}
