<?php

use Illuminate\Database\Migrations\Migration;

class AddOriginalName extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('objects', function($table)
            {
                $table->string('original')->nullable();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('objects', function($table)
            {
                $table->dropColumn('original');
            });
	}

}
