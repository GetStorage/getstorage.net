<?php
/**
 * Eyemart Stores Config
 *
 * Configuration file for Eyemart Stores.
 *
 * @author  Luke Strickland <lstrickland@eyemartexpress.com>
 * @package Eyemart${FILE_NAME}
 */

namespace ApiVersionTwo\CFS;
use Illuminate\Support\Facades\Validator;

class CFSBaseController extends \BaseController {

    public $user;

    public function __construct() {
        $requestedKey = (\Request::header('Storage-Key') != false ? \Request::header('Storage-Key') : \Input::get('key'));
        $key = \Key::where('key', $requestedKey)->first();
        $this->user = \User::find($key->user_id);

        Validator::extend('folder', function ($attribute, $value, $parameters) {
            if(strpbrk($value, "?%*:|\"<>\\") === false) {
                return true;
            } else {
                return false;
            }
        });
    }

    public function missingMethod($parameters) {
        return \Response::json(array('message' => 'Not Found'), 404);
    }
}
