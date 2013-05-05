<?php

namespace ApiVersionTwo;

class ApiObjectController extends \BaseController {

    /**
     * Get all objects from the user
     *
     * @return Response
     */
    public function index() {
        $fs = \FileSystem::where();

        return \Response::json(array('hello'));
    }

    /**
     * Store an object
     *
     * @return Response
     */
    public function store() {

    }

    /**
     * Gets the info about the file IF key owns it
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

    }

}
