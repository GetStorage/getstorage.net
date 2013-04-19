@extends('layouts.master')

@section('title')
Admin - Object
@stop

@section('content')

<h2>{{$object->name}}</h2>

<table class="table">
    <thead>
        <tr>
            <th>IP</th>
            <th>Referrer</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($analytics as $stat)
        <tr>
            <td>{{$stat->ip}}</td>
            <td>{{@json_decode($stat->data, true)['HTTP_REFERER']}}</td>
            <td>{{$stat->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
