@extends('layouts.master')

@section('title')
Billing
@stop

@section('content')

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">
        <h2>Add a Billing Method</h2>

        <p>Since Storage is in early alpha, the Pro features haven't yet been implemented, however we'll be doing that
            shortly. Any subscription you make now will move your account up to Pro, but in truth you'll only be
            supporting Storage's development.</p>

        <p>Also note since paypal sucks, we can't automatically upgrade your account, send me a message at
            luke@axxim.net if I fail to promote you.</p>

        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="SQ4ZFSQKZU5JG">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0"
                   name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>

    </div>
</div>

@stop
