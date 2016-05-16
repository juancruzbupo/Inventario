@extends('layouts.master')

@section('content')

    <h1>Modelo</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID.</th> <th>Nombre</th>
            </tr>
            <tr>
                <td>{{ $modelo->id }}</td> <td> {{ $modelo->nombre }} </td>
            </tr>
        </table>
    </div>

@endsection
