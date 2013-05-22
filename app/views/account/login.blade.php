@extends('layouts.master')

@section('title')
Login
@stop

@section('navigation')

@stop

@section('content')
@if($errors->count() > 0)
<div class="alert alert-error">
    <ul>
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
</div>
@endif

{{ Form::open(array('url' => 'account/login', 'class' => 'form-login form-wrapper form-narrow')) }}
    <h3 class="title-divider"><span>Login</span> <small>Not signed up? {{HTML::linkAction('AccountController@getRegister', 'Sign up here')}}.</small></h3>
    <input type="text" class="input-block-level" name="email" placeholder="Email address">
    <input type="password" class="input-block-level" name="password" placeholder="Password">
    <button class="btn btn-primary" type="submit">Sign in</button>
    | {{HTML::linkAction('AccountController@getForgot', 'Forgotten Password?')}}
{{ Form::close() }}

@stop
