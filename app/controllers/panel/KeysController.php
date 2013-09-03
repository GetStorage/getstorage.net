<?php

namespace Panel;

use Key;
use Sentry;
use View;
use Redirect;
use Response;

class KeysController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $keys = Key::where('user_id', $this->user->id)->get();

        return View::make('panel.keys.index', array('keys' => $keys));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $key = new Key();
        $key->key = Key::generateKey();
        $key->user_id = $this->user->id;
        $key->save();

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $key = Key::where('id', $id)->first();

        if ($key->user_id === $this->user->id) {
            $key->delete();
        }

        return Redirect::action('UserKeysController@index');
    }
}
