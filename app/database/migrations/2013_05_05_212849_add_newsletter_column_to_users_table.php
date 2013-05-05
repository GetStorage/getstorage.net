<?php

use Illuminate\Database\Migrations\Migration;

class AddNewsletterColumnToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function($t){
            $t->boolean('newsletter')->default(1);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users', function($t){
            $t->dropColumn('newsletter');
        });
	}

}
