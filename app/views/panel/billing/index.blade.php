@extends('layouts.master')

@section('title')
Settings
@stop

@section('content')

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">

        <p>Storage isn't currently ready for subscriptions, in the mean time feel free to support us on Gittip!</p>

        <script data-gittip-username="getstorage"
                src="//gttp.co/v1.js"></script>

    </div>
</div>

@stop
