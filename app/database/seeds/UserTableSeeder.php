<?php
/**
 * Eyemart Stores Config
 *
 * Configuration file for Eyemart Stores.
 *
 * @author  Luke Strickland <lstrickland@eyemartexpress.com>
 * @package Eyemart${FILE_NAME}
 */

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        Sentry::register(
            array(
                'username' => 'testing',
                'email'    => 'test@axxim.net',
                'password' => 'testing'
            )
        );
    }

}
