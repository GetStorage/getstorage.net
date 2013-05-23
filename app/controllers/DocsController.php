<?php

class DocsController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function getIndex() {
        return View::make('docs.index');
    }

    public function getAbout() {
        return View::make('docs.about');
    }

    public function getApps() {
        return View::make('docs.apps');
    }

    public function getPrivacy() {
        return View::make('docs.privacy');
    }

    public function getTerms() {
        return View::make('docs.terms');
    }

    public function getLegal() {
        return View::make('docs.legal');
    }

    public function postLegal() {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'notice' => 'required',
            'recaptcha_response_field' => 'required|recaptcha',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::action('DocsController@getLegal')->withErrors($validator);
        }

        Mail::send('emails.docs.legal', Input::all(), function($m) {
            $m->to('legal@getstorage.net', 'Legal Hotline')->subject('Legal Notice');
        });

        return View::make('docs.legal', array('thanks' => true));
    }

    public function getApi($version) {
        if(strlen($version) != 2) App::abort(404);

        return View::make('docs.api.'.$version);
    }

}
