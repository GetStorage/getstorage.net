@extends('layouts.master')

@section('content')


<div class="row pricing-stack">
    <div class="span5">
        <div class="jumbotron">
            <h1>Save, Store, Share</h1>

            <p class="lead">
                Storage is an online file system for your stuff. <br><br>
                <a href="http://clone1018.stor.ag/e/Pictures/koala.jpg" target="_blank">clone1018.stor.ag/e/Pictures/koala.jpg</a><br><br>
                Instantly upload and share what you want to make public, without large fees or worries.
            </p>
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
            <a href="/account/register" class="btn btn-primary">Sign Up</a></div>
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
            <a href="/account/register" class="btn btn-primary">Sign Up</a></div>
    </div>
</div>
@stop
