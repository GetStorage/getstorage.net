<?php

use Illuminate\Database\Migrations\Migration;

class AddAmazon extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('objects', function($table) {
            $table->boolean('s3')->default(false);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('objects', function($table) {
            $table->dropColumn('s3');
        });
	}

}
