<?php

namespace ApiVersionTwo\CFS;
use Response;
use Validator;
use Input;
use CFS;

class FileController extends BaseController {

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($path = null) {
        // Rough Draft:

        // Quick Sanity Check
        if(is_null($path) || $path == '') {
            return Response::api('A path is required.', 400);
        }
        if(!Input::hasFile('file')) {
            return Response::api('A file is required.', 400);
        }

        // Set what we'll need
        $segments = explode('/', $path);
        $filename = array_pop($segments);
        array_shift($segments);
        $folders = $segments;

        // Validate file
        if(!CFS\Folder::ok($folders)) {
            return Response::api('Folder is not ok.', 400);
        }
        if(!CFS\File::ok($filename)) {
            return Response::api('File is not ok.', 400);
        }

        // Construct File && Validate more

        $finfo = array();
        $finfo['file'] = $this->getParam('file', Input::file('file'));
        $finfo['name'] = $filename;

        if(str_contains($path, '/')) {
            $finfo['folder_id'] = CFS\Folder::createRecursive($this->user, $folders);    
        } else {
            $finfo['folder_id'] = null;
        }
        
        $finfo['user_id'] = $this->user->id;
        $finfo['mime'] = $this->getParam('mime', Input::file('file')->getMimeType());
        $finfo['secure'] = $this->getParam('secure', false);
        $finfo['visibility'] = $this->getParam('visibility', 'public');

        $rules = array(
            'file' => 'required', 
            'name' => 'required|min:1|max:255', 
            'folder' => 'folder|min:1|max:255', 
            'mime' => 'required', 
            'secure' => 'required', 
            'visibility' => 'required'
        );

        $validator = Validator::make($finfo, $rules);

        if($validator->fails()) {
            return Response::api($validator->messages(), 400);
        }

        $file = Input::file('file')->move(base_path() . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR, $finfo['file']);

        // Save File 
        $nFile = new CFS\File();

        $nFile->name = $finfo['name'];
        $nFile->folder_id = $finfo['folder_id'];
        $nFile->user_id = $finfo['user_id'];
        $nFile->mime = $finfo['mime'];
        $nFile->secure = $finfo['secure'];
        $nFile->visibility = $finfo['visibility'];
        $nFile->size = Input::file('file')->getClientSize();

        try {
            $nFile->save();
        } catch (\Exception $e) {
            // We should eventually check before we attempt to insert the record as this does id++
            return Response::api('File already exists.', 409);
        }


        // Upload File
        //\Queue::push('CFSUploadFile', array('id' => $nFile->id, 'path' => $file->getRealPath()));

        // Return file object
        return Response::api($nFile, 201);
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
    public function destroy($path = null) {
        if(is_null($path)) {
            return Response::api('A path is required.', 400);
        }
    }

}
