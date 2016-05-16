@extends('layouts.master')

@section('content')

    <h1>Subcuenta</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID.</th><th>Nombre</th><th>Cuenta Codigo</th><th>Stock</th>
            </tr>
            <tr>
                <td>{{ $subcuentum->id }}</td> <td> {{ $subcuentum->nombre }} </td><td> {{ $subcuentum->cuenta_codigo }} </td><td> {{ $subcuentum->stock }} </td>
            </tr>
        </table>
    </div>

@endsection