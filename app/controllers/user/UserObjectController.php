<?php

class UserObjectController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$objects = Object::where('user_id', Sentry::getUser()->id)->get();

        return View::make('panel.object.index', array('objects' => $objects));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$object = Object::where('user_id', Sentry::getUser()->id)->where('name', $id)->first();
        $analytics = ObjectHit::where('object_id', $object->id)->get();

        return View::make('panel.object.show', array('object' => $object, 'analytics' => $analytics));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
