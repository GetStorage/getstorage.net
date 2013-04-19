<?php

use Illuminate\Database\Migrations\Migration;

class AddGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Sentry::getGroupProvider()->create(array(
            'name'        => 'Users',
        ));
        Sentry::getGroupProvider()->create(array(
            'name'        => 'Admins',
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
