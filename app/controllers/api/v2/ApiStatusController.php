<?php

namespace ApiVersionTwo;

class ApiStatusController extends \BaseController {

    /**
     * Returns the status of the api, currently only good for checking if the service is down.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getIndex() {

        return \Response::json(array('status' => 'ok', 'timestamp' => time()), 200);
    }

}
