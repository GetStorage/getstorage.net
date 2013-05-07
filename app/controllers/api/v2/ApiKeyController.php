<?php

namespace ApiVersionTwo;

class ApiKeyController extends ApiBaseController {

	/**
	 * Get all the keys from the user
	 *
	 * @return Response
	 */
	public function index()
	{
		$keys = \Key::where('user_id', '=', $this->user->id)->get();

        return \Response::json($keys);
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

        return \Response::json($key, 201);
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

            return \Response::json(array('message' => 'Key destroyed'));
        } else {
            return \Response::json(array('message' => 'Invalid key'), 401);
        }
	}

}