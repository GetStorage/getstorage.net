@extends('layouts.master')

@section('title')
Admin - Objects
@stop

@section('content')

<div class="row">
    @include('admin.partial.navigation')
    <div class="span9">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Original</th>
                <th>User</th>
                <th>Hits</th>
                <th>Size</th>
                <th>Bandwidth</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objects as $object)
            <tr>
                <td><span class="<?php if($object->s3) echo 'icon-globe'; ?>"></span></td>
                <td><a href="http://stor.ag/e/{{$object->name}}" target="_blank">{{$object->name}}</a></td>
                <td>{{htmlentities($object->shortOriginal())}}</td>
                <td>{{Sentry::getUserProvider()->findById($object->user_id)->username}}</td>
                <td>{{ObjectHit::where('object_id', $object->id)->count()}}</td>
                <td>{{$object->size()}}</td>
                <td>{{$object->bandwidthUsage()}}</td>
                <td>{{$object->created_at}}</td>
                <td><a href="/admin/object/{{$object->name}}" class="btn btn-primary btn-mini">Analytics</a> <button class="btn btn-danger btn-mini">Delete</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop
