@extends('layouts.master')

@section('title')
CFS
@stop

@section('content')

<div class="row">
    @include('panel.partial.navigation')
    <div class="span9">

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Mime</th>
                    <th>Visibility</th>
                    <th>Updated</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                <tr>
                    @foreach ($result as $value)
                    <td>{{ $value }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $paginator->links() }}

    </div>
</div>

@stop
