@extends('layouts.master')

@section('title')
Admin - Users
@stop

@section('content')

<div class="row">
    @include('admin.partial.navigation')
    <div class="span9">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Username</th>
                <th>Files</th>
                <th>Email</th>
                <th>Created On</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td><span class="glyphicon glyphicon-ok-circle"></span></td>
                <td>{{$user->username}}</td>
                <td>{{Object::where('user_id', $user->id)->count()}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td><button class="btn btn-danger btn-mini">Delete</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>



@stop
