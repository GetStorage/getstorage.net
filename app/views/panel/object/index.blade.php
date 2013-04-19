@extends('layouts.master')

@section('title')
My Stuff
@stop

@section('content')

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Hits</th>
                <th>Size</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objects as $object)
            <tr>
                <td><span class="<?php if($object->s3) echo 'glyphicon glyphicon-globe'; ?>"></span></td>
                <td><a href="/e/{{$object->name}}" target="_blank">{{$object->name}}</a></td>
                <td>{{ObjectHit::where('object_id', $object->id)->count()}}</td>
                <td>{{$object->size}}</td>
                <td>{{$object->created_at}}</td>
                <td><a href="/panel/object/{{$object->name}}" class="btn btn-primary btn-mini">Analytics</a> <button class="btn btn-danger btn-mini">Delete</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop
