<?php

namespace ApiVersionTwo\CFS;
use Input;
use Response;


class CFSFolderController extends CFSBaseController {

    /**
     * Display a full tree of everything in the path
     *
     * @param string $path
     * @return Response
     */
    public function index($path = '') {
        $cfs = \CFS::tree($this->user, $path);

        return Response::api($cfs);
    }


    /**
     * Create a new folder
     *
     * @param null $path
     * @return Response
     */
    public function store($path = null) {
        // Let's do some early checking
        if($path === null) {
            return Response::api("You must specify a path.", 404);
        }

        $folder = Folder::createRecursive($user, explode('/', $path));

        if($folder) {
            return self::index($path);
        } else {
            return Response::api('Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
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
        //
    }

}
