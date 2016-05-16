@extends('layouts.master')

@section('content')

    <h1>Dependecia</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID.</th> <th>Nombre</th><th>Es Int</th>
            </tr>
            <tr>
                <td>{{ $dependecium->id }}</td> <td> {{ $dependecium->nombre }} </td><td> {{ $dependecium->es_int }} </td>
            </tr>
        </table>
    </div>

@endsection
