<?php


namespace ApiVersionTwo;
use Input;
use Response;


/***
 * Class ApiCfsController
 *
 * Welcome to the CFS API Controller, this controller is very dynamic,
 * as it handles a combination of files and folders.
 *
 * @package ApiVersionTwo
 */
class ApiCfsController extends ApiBaseController
{

    /**
     * Return a list of all files and folders inside users cfs.
     * This action controls
     * GET /cfs/*
     * @param null $segments
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($segments = null)
    {
        $fs = \CFS::tree($this->user, $segments);
        if(is_null($fs)) {
            return Response::json(array('message' => 'Resource not found.'), 404);
        }

        return Response::json($fs);
    }


    /**
     * @param null $segments
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($segments = null)
    {
        // Handle segments
        if(is_null($segments) && !$this->getParam('path')) {
            return Response::json(array('message' => 'A path is required.'), 400);
        }
        $path = (!is_null($segments)? $segments : $this->getParam('path'));
        if(!\CFS::validatePath($path)) {
            return Response::json(array('message' => 'Invalid path.'), 400);
        }

        // get params

        $finfo = array();
        $finfo['file'] = $this->getParam('file', Input::file('file'));
        $finfo['filename'] = $this->getParam('filename', Input::file('file')->getClientOriginalName());
        $finfo['folder'] = $this->getParam('folder', null);
        $finfo['mime'] = $this->getParam('mime', Input::file('file')->getMimeType());
        $finfo['secure'] = $this->getParam('secure', false);
        $finfo['visibility'] = $this->getParam('visibility', 'public');

        // validate
        $rules = array('key' => 'unique:cfs,key', 'file' => 'required', 'filename' => 'required|min:1|max:255', 'folder' => 'folder|min:1|max:255', 'mime' => 'required', 'secure' => 'required', 'visibility' => 'required');

        $folder = \CFS::cleanFolder($finfo['folder']);

        $finfo['key'] = $this->user->username . '/e/' . $folder . '/' . $finfo['filename'];

        $validator = \Validator::make($finfo, $rules);

        if ($validator->fails()) {
            return Response::json(array('status' => 'failure', 'messages' => $validator->messages()->toArray()), 409);
        }

        $file = Input::file('file')
            ->move(base_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR, $finfo['file']);

        // save to db
        $cfs = new \CFS();

        $cfs->key = $finfo['key'];
        $cfs->name = $finfo['filename'];
        $cfs->folder = $folder;
        $cfs->mime = $finfo['mime'];
        $cfs->secure = $finfo['secure'];
        $cfs->visibility = $finfo['visibility'];
        $cfs->mime = $finfo['mime'];
        $cfs->size = Input::file('file')->getClientSize();
        $cfs->user_id = $this->user->id;

        $saved = $cfs->save();


        // queue
        \Queue::push('CFSUploadFile', array('key' => $cfs->key, 'path' => $file->getRealPath()));

        // Send object out
        if ($this->getParam('return', 'json') == 'url') {
            $key = str_replace($this->user->username . '/', '', $cfs->key);

            return Response::json(array('url' => 'http://' . $this->user->username . '.stor.ag/' . $key));
        } else {
            return Response::json($cfs, 200);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($segments = null)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($segments = null)
    {

    }

    /**
     * @param $name
     * @param bool $default
     * @return string
     */
    private function getParam($name, $default = false)
    {
        // Check Request::header, Input::get and other stuff in the future
        $header = \Request::header('CFS-' . $name);
        $input = Input::get($name);


        if ($header) return $header;
        if ($input) return $input;

        if (!$header && !$input) {
            return $default;
        }
    }

}
