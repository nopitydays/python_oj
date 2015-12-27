<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProSubmitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pro_submits', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('pro_id');
            $table->string('status')->default('waiting');
            $table->string('path');
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
		Schema::drop('pro_submits');
	}

}
