@extends('layouts.master')

@section('title')
Log - Admin
@stop

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
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{$log->level}}</td>
                <td>{{$log->shortMessage()}}</td>
                <td>{{$log->context}}</td>
                <td>{{HTML::linkAction('AdminLogController@show', 'View', $log->id)}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop
