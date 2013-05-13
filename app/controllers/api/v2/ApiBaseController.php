<?php


namespace ApiVersionTwo;


class ApiBaseController extends \BaseController {

    public $user;

    public function __construct() {
        $requestedKey = (\Request::header('Storage-Key') != false ? \Request::header('Storage-Key') : \Input::get('key'));
        $key = \Key::where('key', $requestedKey)->first();
        $this->user = \User::find($key->user_id);
    }

}
