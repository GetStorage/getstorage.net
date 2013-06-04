<?php

namespace ApiVersionTwo;
use Input;
use Response;

class ApiKeyController extends ApiBaseController {

	/**
	 * Get all the keys from the user
	 *
	 * @return Response
	 */
	public function index()
	{
		$keys = \Key::where('user_id', '=', $this->user->id)->get();

        return Response::api($keys);
	}

	/**
	 * Generate an API key under the user's account
	 *
	 * @return Response
	 */
	public function store()
	{
        $key = new \Key();
        $key->key = \Key::generateKey();
        $key->user_id = $this->user->id;
        $key->save();

        return Response::api($key, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  string  $key
	 * @return Response
	 */
	public function destroy($key)
	{
		$key = \Key::whereKey($key)->first();

        if($key->user_id === $this->user->id) {
            $key->delete();

            return Response::api(array('message' => 'Key destroyed'));
        } else {
            return Response::api(array('message' => 'Invalid key'), 401);
        }
	}

}