@extends('layouts.master')

@section('content')

<div class="row">
    @include('admin.partial.navigation')
    <div class="span9">
        <table class="table">
            <thead>
            <tr>
                <th>Level</th>
                <th>Message</th>
                <th>Context</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{$log->level}}</td>
                <td>{{$log->message}}</td>
                <td>{{$log->context}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop
