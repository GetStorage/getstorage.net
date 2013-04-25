@extends('layouts.master')

@section('title')
Settings
@stop

@section('content')

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">

        <div class="tabbable">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Custom Domains</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <!--<p>By default you're given <a href="http://{{Sentry::getUser()->username}}.stor.ag/e/">{{Sentry::getUser()->username}}.stor.ag/e/</a>
                    </p>
                    <br>
                    <p>If you'd like additional domains or you'd like to use your own domains, please consider upgrading
                        to <a href="/docs/pro">Pro</a>.
                    </p>
                    -->
                </div>

            </div>
        </div>

    </div>
</div>

@stop
