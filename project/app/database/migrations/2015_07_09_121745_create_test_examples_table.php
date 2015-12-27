<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestExamplesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_examples', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('pro_id');
            $table->text('input');
            $table->text('output');
            $table->integer('serial');
            $table->string('type');
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
		Schema::drop('test_examples');
	}

}
