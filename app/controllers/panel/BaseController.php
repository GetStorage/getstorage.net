<?php

namespace Panel;

use User;
use Sentry;

class BaseController extends \Controller {

    public $user;

    public function __construct() {

        $this->user = User::find(Sentry::getUser()->id)->first();

    }

}