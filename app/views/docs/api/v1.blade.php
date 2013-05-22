@extends('layouts.master')

@section('content')
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
@stop
