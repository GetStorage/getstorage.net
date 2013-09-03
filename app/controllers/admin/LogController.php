<?php

namespace Admin;

use SiteLog;
use View;
use Response;

class LogController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $logs = SiteLog::orderBy('created_at', 'asc')->get();

        return View::make('admin.log.index', array('logs' => $logs));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $log = SiteLog::find($id);

        return View::make('admin.log.show', array('log' => $log));
    }

}
