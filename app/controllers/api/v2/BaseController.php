<?php


namespace ApiVersionTwo;

use Response;

class BaseController extends \ProtectedController {

    public function missingMethod($parameters) {
        return Response::api(array('message' => 'Not Found'), 404);
    }
}
