@extends('layouts.master')

@section('title')
My Objects
@stop

@section('content')
<p>Please note, while we work on getting click tracking working across our cache servers, analytics will be unstable.</p>

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Filename</th>
                <th>Hits</th>
                <th>Size</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objects as $object)
            <tr>
                <td><span class="<?php if($object->s3) echo 'icon-globe'; ?>"></span></td>
                <td><a href="http://stor.ag/e/{{$object->name}}" target="_blank">{{($object->original ? $object->original : $object->name)}}</a></td>
                <td>{{ObjectHit::where('object_id', $object->id)->count()}}</td>
                <td>{{$object->size}}</td>
                <td>{{$object->created_at}}</td>
                <td>{{Form::open(array('url' => '/panel/object/'.$object->name, 'method' => 'delete'))}}<button class="btn btn-danger btn-mini delete" data-name="{{$object->nae}}">Delete</button>{{Form::close()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop
