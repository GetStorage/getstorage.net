@extends('layouts.master')

@section('title')
My Keys
@stop

@section('content')

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">

        <h2>My Keys</h2>
        <p>In the future this will show usages of your keys, to help manage your access better. For now you can add/delete keys.</p>

        {{Form::open(array('method'=>'POST', 'class'=>'pull-right'))}}
        <input type="submit" class="btn btn-primary" value="New Key"/>
        {{Form::close()}}

        <table class="table">
            <thead>
            <tr>
                <th>Key</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($keys as $key)
            <tr>
                <td>{{$key->key}}</td>
                <td>{{Form::open(array('url' => '/panel/keys/'.$key->id, 'method' => 'delete'))}}<button class="btn btn-danger btn-mini delete" data-key="{{$key->key}}">Delete</button>{{Form::close()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop
