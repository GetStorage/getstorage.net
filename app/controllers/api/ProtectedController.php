<?php

/**
 * Class ProtectedController
 * This controller is will handle all of our authenticated api endpoints.
 */
class ProtectedController extends \Controller {

    public $user;

    public function __construct() {
        $requestedKey = (Request::header('Storage-Key') != false ? Request::header('Storage-Key') : Input::get('key'));
        $key = Key::where('key', $requestedKey)->first();
        $this->user = User::find($key->user_id);

        Validator::extend('segment', function ($attribute, $value, $parameters) {
            if(strpbrk($value, "?%*:|\"<>\\") === false) {
                return true;
            } else {
                return false;
            }
        });
    }

}
