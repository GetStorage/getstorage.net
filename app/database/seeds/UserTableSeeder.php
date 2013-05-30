<?php

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
