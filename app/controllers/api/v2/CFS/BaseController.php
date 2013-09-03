<?php

namespace ApiVersionTwo\CFS;

use Cartalyst\Api\Facades\Input;
use Key;
use Request;
use Response;
use User;

class BaseController extends \ProtectedController {

    public function missingMethod($parameters) {
        return Response::api(array('message' => 'Not Found'), 404);
    }

    /**
     * @param      $name
     * @param bool $default
     *
     * @return string
     */
    public function getParam($name, $default = false) {
        // Check Request::header, Input::get and other stuff in the future
        $header = Request::header('CFS-' . $name);
        $input = Input::get($name);

        if (!$header && !$input) {
            return $default;
        }

        if ($header) {
            return $header;
        }
        if ($input) {
            return $input;
        }
    }
}
