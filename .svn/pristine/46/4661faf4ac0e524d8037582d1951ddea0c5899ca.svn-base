@extends('layouts.master')

@section('content')

    <h1>Cuentas <a href="{{ url('/cuenta/create') }}" class="btn btn-primary pull-right btn-sm">Crear Cuenta</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>SL.</th><th>Nombre</th><th>Codigo</th><th>Accion</th>
            </tr>
            {{-- */$x=0;/* --}}
            @foreach($cuentas as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/cuenta', $item->id) }}">{{ $item->nombre }}</a></td><td>{{ $item->codigo }}</td>
                    <td><a href="{{ url('/cuenta/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Editar</button></a> / {!! Form::open(['method'=>'delete','action'=>['CuentaController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Borrar</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
