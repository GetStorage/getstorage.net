<?php

class AdminHomeController extends BaseController {

    public function getIndex() {
        return View::make('admin.home.index');
    }


}
