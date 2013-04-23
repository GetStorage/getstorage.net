@extends('layouts.master')

@section('title')
Apps
@stop

@section('content')
<h2>Storage Apps</h2>
<p>Most storage apps are developed by the community, if you'd like to contribute join us on irc.esper.net/#storage or
    contact luke@axxim.net</p>
<hr>

<div class="row">

    <div class="span4">
        <h2>Store
            <small>Python</small>
        </h2>
        <p>Store is a simple app to store your files on Storage.</p>

        <strong>Windows Usage</strong>
        <ul>
            <li><code>setup.exe path/to/file</code></li>
            <li><i>Optionally move to C:\Windows\ or add to path</i></li>
        </ul>
        <strong>Any Usage</strong>
        <ul>
            <li>Unzip</li>
            <li><code>python setup.py install</code></li>
            <li><code>cd bin</code></li>
            <li><code>./store path/to/file</code></li>
        </ul>

        <a href="http://stor.ag/e/ac8a4e">Windows</a> - <a href="http://stor.ag/e/18b6b8">Any</a>
    </div>

    <div class="span4">
        <h2>Store.NET
            <small>C#</small>
        </h2>
        <p>Simple "complete" app built for uploading files and taking screenshots with Storage.</p>

        <div class="center"><img src="http://stor.ag/e/2bc682" alt=""></div>

        <br class="clearfix">

        <a href="http://stor.ag/e/bee1c0">Windows</a> - <a href="https://github.com/TheEndermen/Store.NET/">Source</a>
    </div>

</div>

@stop
