<?php


namespace ApiVersionTwo;


class ApiCfsController extends \BaseController {

    /**
     * Get all objects from the user
     *
     * @return Response
     */
    public function index() {
        $fs = \CFS::where();

        return \Response::json(array('hello'));
    }

    /**
     * Store an object
     *
     * @return Response
     */
    public function store() {
    
    	// Should we handle everything here or write individual handlers?
    
		// get params
		$file = $this->getParam('file');
		
		// If we want to store a URL's location
		// get headers of url now and send the file
		// location to a queue.
		if($file == url) {
			$request = Requests::get($file);
			$finfo = $request->headers();
		}

		// validate
		$rules = array(
			'filename' => '',
			'folder' => '',
			'mime' => '',
			''
		);
		
		$validator = new Validator($input, $rules);

		// save to db
		$cfs = new \CFS();
		
		$cfs->id = '';
		$cfs->
		
		$cfs->save();

		// queue
		
		// Send object out
		return \Response::json($object, 200);
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
    
    private function getParam($name) {
    	// Check Request::header, Input::get and other stuff in the future
		$header = \Request::header($name);
		$input = \Input::get($name);
		
		if($header) return $header;
		if($input) return $input;	
    }

}
