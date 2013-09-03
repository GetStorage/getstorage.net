<?php

namespace Panel;

use View;

class HomeController extends BaseController {

    public function getIndex() {
        return View::make('panel.user.index');
    }

    public function getSettings() {
        return View::make('panel.user.settings');
    }

}
