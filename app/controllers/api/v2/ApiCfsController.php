<?php


namespace ApiVersionTwo;


class ApiCfsController extends \BaseController {

    private $user;

    public function __construct() {
        $requestedKey = (\Request::header('Storage-Key') != false ? \Request::header('Storage-Key') : \Input::get('key') );
        $key = \Key::where('key', $requestedKey)->first();
        $this->user = \User::find($key->user_id);
    }

    /**
     * Get all objects from the user
     *
     * @return Response
     */
    public function index() {
        $fs = \CFS::where('user_id', $this->user->id)->get()->toArray();

        for($i = 0; count($fs) > $i; $i++) {
            $key = str_replace($this->user->username.'/', '', $fs[$i]['key']);
            $fs[$i]['url'] = 'http://'.$this->user->username.'.stor.ag/'.$key;
        }


        return \Response::json($fs);
    }

    /**
     * Store an object
     *
     * @return \Response
     */
    public function store() {

        // We should move these somewhere else
        // @todo add message
        \Validator::extend('folder', function($attribute, $value, $parameters) {
            if(strpbrk($value, "?%*:|\"<>\\") === FALSE) {
                return true;
            } else {
                return false;
            }
        });
    
    	// Should we handle everything here or write individual handlers?
    
		// get params

        $finfo = array();
		$finfo['file'] = $this->getParam('file', \Input::file('file'));
        $finfo['filename'] = $this->getParam('filename', \Input::file('file')->getClientOriginalName());
        $finfo['folder'] = $this->getParam('folder', null);
        $finfo['mime'] = $this->getParam('mime', \Input::file('file')->getMimeType());
        $finfo['secure'] = $this->getParam('secure', false);
        $finfo['visibility'] = $this->getParam('visibility', 'public');

		// validate
		$rules = array(
            'key' => 'unique:cfs,key',
            'file' => 'required',
			'filename' => 'required|min:1|max:255',
			'folder' => 'folder|min:1|max:255',
			'mime' => 'required',
			'secure' => 'required',
            'visibility' => 'required'
		);

        $folder = \CFS::cleanFolder($finfo['folder']);

        $finfo['key'] = $this->user->username . '/e/' . $folder . '/' . $finfo['filename'];
		
		$validator = \Validator::make($finfo, $rules);

        if($validator->fails()) {
            return \Response::json(array('status' => 'failure', 'messages' => $validator->messages()->toArray()), 409);
        }

        $file = \Input::file('file')->move(base_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR, $finfo['file']);

		// save to db
		$cfs = new \CFS();

        $cfs->key = $finfo['key'];
        $cfs->name = $finfo['filename'];
        $cfs->folder = $folder;
        $cfs->mime = $finfo['mime'];
        $cfs->secure = $finfo['secure'];
        $cfs->visibility = $finfo['visibility'];
        $cfs->mime = $finfo['mime'];
        $cfs->size = \Input::file('file')->getClientSize();
        $cfs->user_id = $this->user->id;

		$saved = $cfs->save();


		// queue
        \Queue::push('CFSUploadFile', array('key' => $cfs->key, 'path' => $file->getRealPath()));

		// Send object out
		return \Response::json($cfs, 200);
    }

    /**
     * Gets the info about the file IF key owns it
     *
     * @param  string $key
     * @return Response
     */
    public function show($key) {
        $file = \CFS::where(array('key' => $key, 'user_id' => $this->user->id))->first();
        if(!$file) {
            return \Response::json(array('message' => 'File Not Found'), 404);
        }

        return \Response::json($file);
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

    /**
     * @param $name
     * @param bool $default
     * @return string
     */
    private function getParam($name, $default = false) {
    	// Check Request::header, Input::get and other stuff in the future
		$header = \Request::header('CFS-' . $name);
		$input = \Input::get($name);

        if(!$header && !$input) {
            return $default;
        }
		
		if($header) return $header;
		if($input) return $input;	
    }

}
