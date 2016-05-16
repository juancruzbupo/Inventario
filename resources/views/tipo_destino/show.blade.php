@extends('layouts.master')

@section('content')

    <h1>Tipo Destino</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tipo_destino->id }}</td> <td> {{ $tipo_destino->nombre }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection