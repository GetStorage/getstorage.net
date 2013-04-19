<?php

use Illuminate\Database\Migrations\Migration;

class CreateApiKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('keys', function($table)
            {
                $table->increments('id');

                $table->string('key');
                $table->string('name')->nullable();
                $table->integer('user_id')->unsigned();
                $table->timestamps();

                $table->unique('key');

                $table->foreign('user_id')->references('id')->on('users');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('keys');
	}

}
