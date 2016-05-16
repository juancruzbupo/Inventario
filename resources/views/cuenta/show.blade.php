@extends('layouts.master')

@section('content')

    <h1>Cuenta</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID.</th> <th>Nombre</th><th>Codigo</th>
            </tr>
            <tr>
                <td>{{ $cuentum->id }}</td> <td> {{ $cuentum->nombre }} </td><td> {{ $cuentum->codigo }} </td>
            </tr>
        </table>
    </div>

@endsection
