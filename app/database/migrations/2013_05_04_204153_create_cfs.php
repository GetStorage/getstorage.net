<?php

use Illuminate\Database\Migrations\Migration;

class CreateCfs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cfs', function($table) {
			$table->increments('id');

            $table->string('key');
			$table->string('name', 255); 
			$table->string('folder', 255)->nullable();
			$table->string('mime');
			$table->boolean('secure');
			$table->string('visibility');
			$table->integer('size');
            $table->integer('user_id')->unsigned();
            $table->text('misc'); // Misc json_encode'd data
            $table->boolean('s3');

            $table->unique('key');

            $table->foreign('user_id')->references('id')->on('users');

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
		Schema::drop('cfs');
	}

}