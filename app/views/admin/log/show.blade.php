@extends('layouts.master')

@section('content')

<div class="row">
    @include('admin.partial.navigation')
    <div class="span9">
        <h2>{{$log->level}} at {{$log->created_at}}</h2>
        <pre>{{$log->message}}</pre>
    </div>
</div>

@stop
