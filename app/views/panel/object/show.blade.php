@extends('layouts.master')

@section('title')
{{$obect->name}}
@stop

@section('content')

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">

        <h2>{{$object->name}}</h2>
        <p>We'll be adding more to this page soon!</p>

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
                <td>{{preg_replace('/(?!\d{1,3}\.\d{1,3}\.)\d/', '*', $stat->ip)}}</td>
                <td>{{@json_decode($stat->data, true)['HTTP_REFERER']}}</td>
                <td>{{$stat->created_at}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>




@stop
