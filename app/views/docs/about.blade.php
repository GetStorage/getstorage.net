@extends('layouts.master')

@section('title')
About
@stop

@section('content')
<div class="row">
    @include('docs.partial.navigation')

    <!--main content-->
    <div class="span9">
        <h2 class="title-divider"><span>The <span class="de-em">Team</span></span></h2>

        <!-- The team -->
        <div class="block team margin-top-large" id="team">
            <div class="media">
                <div class="pull-left">
                    <img src="https://www.gravatar.com/avatar/{{md5('luke@axxim.net')}}" class="img-polaroid media-object" alt="Jimi">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Luke Strickland</h4>

                    <p class="role">Founder &amp; Lead Developer</p>
                    <p title="I'm so sorry. This is horribly written :(">Luke created Storage when he realized the only way to share files with his friends was via an
                        ad-ridden website, or waiting for an application to sync your files. He realized there had to be
                        a better way, so he created Storage!</p>
                    <ul class="inline">
                        <li><a href="https://www.twitter.com/clone1018"><i class="icon-twitter"></i> Twitter</a></li>
                        <li><a href="https://github.com/clone1018"><i class="icon-github"></i> Github</a></li>
                        <li><a href="https://plus.google.com/104448221006262595331"><i class="icon-google-plus"></i>
                                Google+</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
