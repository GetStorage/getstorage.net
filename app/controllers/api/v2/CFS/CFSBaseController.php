<?php

namespace ApiVersionTwo\CFS;
use Illuminate\Support\Facades\Validator;
use Response;

class CFSBaseController extends \BaseController {

    public $user;

    public function __construct() {
        $requestedKey = (\Request::header('Storage-Key') != false ? \Request::header('Storage-Key') : \Input::get('key'));
        $key = \Key::where('key', $requestedKey)->first();
        $this->user = \User::find($key->user_id);

        Validator::extend('segment', function ($attribute, $value, $parameters) {
            if(strpbrk($value, "?%*:|\"<>\\") === false) {
                return true;
            } else {
                return false;
            }
        });
    }

    public function missingMethod($parameters) {
        return Response::api(array('message' => 'Not Found'), 404);
    }

    /**
     * @param $name
     * @param bool $default
     * @return string
     */
    public function getParam($name, $default = false) {
        // Check Request::header, Input::get and other stuff in the future
        $header = \Request::header('CFS-' . $name);
        $input = \Input::get($name);

        if(!$header && !$input) {
            return $default;
        }

        if($header) return $header;
        if($input) return $input;
    }

}
