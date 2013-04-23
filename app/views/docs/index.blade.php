@extends('layouts.master')

@section('content')


<div class="row pricing-stack">
    <div class="span5">
        <div class="jumbotron">
            <h1>Save, Store, Share</h1>

            <p class="lead">Storage is a mixture of file hosting, and a filesystem for the web. Upload your files to us
                and they'll instantly be made publicly available. Ad-free and totally awesome.</p>
            <a class="btn btn-large btn-info" href="/account/register">Sign up for Beta</a>
        </div>
    </div>
    <div class="span3">
        <div class="well">
            <h3 class="title">Starter</h3>

            <p class="price"><span class="fancy">Free Forever!</span></p>
            <ul class="unstyled points">
                <li>User Subdomains</li>
                <li>50MB Max Filesize</li>
                <li>1GB Total Account Storage</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a></div>
    </div>
    <div class="span4">
        <div class="well active">
            <h3 class="title"><span class="em">Pro</span> <span class="fancy">Coming Soon</span></h3>

            <p class="price"><span class="currency">$</span> <span class="digits">3<span>.00</span></span> <span
                    class="term">/MO</span></p>
            <ul class="unstyled points">
                <li>Custom Domains / User Subdomain</li>
                <li>500MB Max Filesize</li>
                <li>10GB Total Account Storage</li>
            </ul>
            <a class="btn btn-primary">Sign Up</a></div>
    </div>
</div>
@stop
