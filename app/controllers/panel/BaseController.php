<?php

namespace Panel;

use Sentry;
use User;

class BaseController extends \Controller {

    public $user;

    public function __construct() {
        $this->user = User::find(Sentry::getUser()->id)->first();
    }
}
