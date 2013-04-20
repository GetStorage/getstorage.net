@extends('layouts.master')

@section('content')

<div class="row">
    <div class="span3">
        <div class="well-mini">
            <h3>{{$endpoint}}</h3>
        </div>
    </div>
    <div class="span9">
        <div class="title-divider" id="stats">
            <h3><span>POST:</span><span class="de-em">{{$endpoint}}/object</span> <small>Upload something</small></h3>
        </div>
        <p>Derp a herp how2format</p>
    </div>
</div>

@stop
