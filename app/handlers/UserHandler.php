<?php

class UserHandler
{

    public function onRegister($data, $activationCode)
    {
        Mail::send('emails.auth.register', array('user' => $data, 'activationCode' => $activationCode), function($m) use($data)
            {
                $m->to($data->email)->subject('Welcome to Storage!');
            });
    }

    public function onForgot($data, $forgotCode)
    {
        Mail::send('emails.auth.forgot', array('user' => $data, 'forgotCode' => $forgotCode), function ($m) use ($data) {
                $m->to($data->email)->subject('Forgot Password?');
            }
        );
    }


}
