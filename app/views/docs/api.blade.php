@extends('layouts.master')

@section('content')

<div class="row">
    <div class="span3">
        <div class="well-mini">
            <div class="title">
                <h3>
                    <span class="de-em">Status:</span> <span>Development</span>
                </h3>
            </div>
        </div>
    </div>
    <div class="span9">
        <!--
        <div class="title">
            <h3>
                <span>Storage API</span>
            </h3>
        </div>
        <p>Our api is simple, but still changing!</p>

        <div class="title-divider" id="stats">
            <h3>
                <span><i class="icon-lock"></i> POST:</span><span class="de-em">{{$endpoint}}/object</span>
                <small>You'll use this api endpoint to upload files to our servers</small>
            </h3>
        </div>
        <div class="media-body">
            <p>Arguments</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Description</th>
                        <th>Example Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>key</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <p>Response</p>
            <pre>Montes cursus, turpis scelerisque adipiscing vel in. Ultrices platea ridiculus nascetur vut aliquet odio vel placerat! A, ultricies augue turpis scelerisque, porta diam ac!</pre>

            <p>jkhAnothertest.</p>
        </div>
        -->

        <div id="mashape-container"></div>
        <script type="text/javascript">
            ( function ( window ) {
                window._MashapeConfig = {
                    selector: '#mashape-container',
                    user:     'clone1018',
                    api:      'storage'
                };
                var script = document.createElement( 'script' );
                script.type = 'text/javascript';
                script.src = 'https://www.mashape.com/public/embed.js';
                var entry = document.getElementsByTagName( 'script' )[0];
                entry.parentNode.insertBefore( script, entry );
            }( window ) );
        </script>
    </div>
</div>

@stop
