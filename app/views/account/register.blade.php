@extends('layouts.master')

@section('title')
Register
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

{{ Form::open(array('url' => 'account/register', 'class' => 'form-login form-wrapper form-medium')) }}
    <h3 class="title-divider">
        <span>Sign Up</span>
        <small>Already signed up? {{Html::linkAction('AccountController@getLogin', 'Login here')}}.</small>
    </h3>
    <h5>Account Information</h5>
    <input type="text" class="input-block-level placeholder" name="username" placeholder="Username">
    <input type="email" class="input-block-level placeholder" name="email" placeholder="Email address">
    <input type="password" class="input-block-level placeholder" name="password" placeholder="Password">
    <input type="password" class="input-block-level placeholder" name="password_confirm" placeholder="Repeat Password"/>
    <label class="checkbox">
        <input type="checkbox" value="term">
        I agree with the {{Html::linkAction('DocsController@getTerms', 'Terms and Conditions', null, array('target' => '_blank'))}}. </label>
    <label class="checkbox">
        <input type="checkbox" name="newsletter" value="1" checked>
        I wish to receive newsletter updates</label>
    <button class="btn btn-primary" type="submit">Sign up</button>
{{ Form::close() }}
@stop
