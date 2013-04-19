<?php

class UserHomeController extends BaseController {

    public function getIndex() {
        return View::make('panel.user.index');
    }

    public function getSettings() {
        return View::make('panel.user.settings');
    }

}
