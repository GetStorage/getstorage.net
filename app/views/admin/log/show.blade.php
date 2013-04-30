@extends('layouts.master')

@section('content')

<div class="row">
    @include('admin.partial.navigation')
    <div class="span9">
        <h2>{{$log->level}} <small>{{$log->message}}</small></h2>
    </div>
</div>

@stop
