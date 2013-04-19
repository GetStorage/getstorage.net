<?php

use Illuminate\Database\Migrations\Migration;

class CreateStuff extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('objects', function($table)
            {
                $table->increments('id');

                $table->string('name');
                $table->integer('user_id')->unsigned();
                $table->boolean('public');
                $table->string('mime');
                $table->string('extension');
                $table->integer('size');
                $table->string('path');
                $table->text('file');
                $table->timestamps();

                $table->unique('name');

                $table->foreign('user_id')->references('id')->on('users');
            });

        Schema::create('object_hits', function($table)
            {
                $table->increments('id');

                $table->integer('object_id')->unsigned();
                $table->string('ip');
                $table->text('data');
                $table->timestamps();

                $table->foreign('object_id')->references('id')->on('objects');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('objects');
        Schema::drop('object_hits');
	}

}
