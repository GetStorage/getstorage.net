@extends('layouts.master')

@section('title')
Legal
@stop

@section('content')

<div class="row">
    @include('docs.partial.navigation')

    <!--main content-->
    <div class="span9">
        <h2>Legal</h2>
        <p>Storage is happy to review any legal notices you'd like to send our way, please use the form below to get in contact.</p>

        @if(isset($thanks))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Thanks!</h4>
            We've sent your email to our legal team and we'll be in touch soon.
        </div>
        @else
        <div class="row-fluid">
            <div class="span6">
                @if($errors->count() > 0)
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{ Form::open(array('action' => 'DocsController@postLegal', 'id' => 'contact-form')) }}
                <form id="contact-form" action="#">
                    {{ Form::text('name', null, array('placeholder' => 'Name', 'class' => 'span11 placeholder')) }}
                    <br>
                    {{ Form::email('email', null, array('placeholder' => 'Email', 'class' => 'span11 placeholder')) }}
                    <br>
                    {{ Form::text('company', null, array('placeholder' => 'Company', 'class' => 'span11 placeholder')) }}
                    <br>
                    {{ Form::textarea('notice', null, array('placeholder' => 'Message', 'class' => 'span11 placeholder')) }}
                    <br>

                    {{ Form::captcha() }}
                    <br>
                    {{ Form::submit('Send Message', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
            </div>
        </div>
        @endif

    </div>
</div>

@stop
