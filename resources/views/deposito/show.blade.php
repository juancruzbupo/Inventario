@extends('layouts.master')

@section('content')

    <h1>Deposito</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $deposito->id }}</td> <td> {{ $deposito->nombre }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection