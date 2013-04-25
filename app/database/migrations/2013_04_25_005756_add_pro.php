<?php

use Illuminate\Database\Migrations\Migration;

class AddPro extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $group = Sentry::getGroupProvider()->findByName('Users');
        $group->permissions = array(
            'status.index' => 1,
            'object.store' => 1,
            'object.show' => 1,
            'object.delete' => 1,
        );
        $group->save();

        // Give all users this group.
        $userGroup = Sentry::getGroupProvider()->findByName('Users');
        foreach(Sentry::getUserProvider()->findAll() as $user) {
            $user->addGroup($userGroup);
        }

		Sentry::getGroupProvider()->create(array(
            'name' => 'Pro',
            'permissions' => array(
                ''
            )
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
