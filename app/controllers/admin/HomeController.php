<?php

namespace Admin;

use Object;
use ObjectHit;
use Sentry;
use View;

class HomeController extends BaseController {

    public function getIndex() {
        $objects = Object::all()->count();
        $hits = ObjectHit::all()->count();
        $users = count(Sentry::getUserProvider()->findAll());


        return View::make('admin.home.index', array(
            'objects' => $objects,
            'hits' => $hits,
            'users' => $users
        ));
    }

}
