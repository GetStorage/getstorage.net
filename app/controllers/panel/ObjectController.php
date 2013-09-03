<?php

namespace User;

use Object;
use ObjectHit;
use Queue;
use Redirect;
use View;
use Response;

class ObjectController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $objects = Object::where('user_id', $this->user->id)->get();

        return View::make('panel.object.index', array('objects' => $objects));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $object = Object::where('user_id', $this->user->id)->where('name', $id)->first();
        $analytics = ObjectHit::where('object_id', $object->id)->get();

        return View::make('panel.object.show', array('object' => $object, 'analytics' => $analytics));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $name
     *
     * @return Response
     */
    public function destroy($name) {
        $object = Object::where('user_id', $this->user->id)->where('name', $name)->first();

        Queue::push('DeleteFile', array('name' => $object->name));
        $object->delete();

        return Redirect::action('UserObjectController@index');
    }
}
