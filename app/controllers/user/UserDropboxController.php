<?php

class UserDropboxController extends BaseController {

    public function getIndex() {
        $user = Sentry::getUser();

        $callback = 'http://getstorage.dev/panel/dropbox';
        $encrypter = new \Dropbox\OAuth\Storage\Encrypter(Config::get('app.key'));

        // @todo get nonspecific database connection or existing PDO object
        $storage = new \Dropbox\OAuth\Storage\PDO($encrypter, $user->id);
        $storage->connect(Config::get('database.host'), Config::get('database.database'), Config::get('database.username'), Config::get('database.password'), 3306);

        $OAuth = new \Dropbox\OAuth\Consumer\Curl(Config::get('dropbox.key'), Config::get('dropbox.secret'), $storage, $callback);
        $dropbox = new \Dropbox\API($OAuth);

        var_dump($dropbox->delta());
    }

    public function getAuth() {
        var_dump(Input::all());
    }

}
