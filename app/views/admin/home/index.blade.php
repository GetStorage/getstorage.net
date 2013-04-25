@extends('layouts.master')

@section('title')
Admin Home
@stop

@section('content')

<div class="row">
    @include('admin.partial.navigation')
    <div class="span9">
        <div class="row-fluid">
            <div class="span4">
                <h2>Objects</h2>
                <h3>{{$objects}}</h3>
            </div>
            <div class="span4">
                <h2>Object Hits</h2>
                <h3>{{$hits}}</h3>
            </div>
            <div class="span4">
                <h2>Users</h2>
                <h3>{{$users}}</h3>
            </div>
        </div>
    </div>
</div>


@stop
