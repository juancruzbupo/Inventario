@extends('layouts.master')

@section('content')

    <h1>Subcuentas <a href="{{ url('/subcuenta/create') }}" class="btn btn-primary pull-right btn-sm">Crear Subcuenta</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>SL.</th><th>Nombre</th><th>Cuenta Codigo</th><th>Stock</th><th>Accion</th>
            </tr>
            {{-- */$x=0;/* --}}
            @foreach($subcuentas as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/subcuenta', $item->id) }}">{{ $item->nombre }}</a></td><td>{{ $item->cuenta->nombre }}</td><td>{{ $item->stock }}</td>
                    <td><a href="{{ url('/subcuenta/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Editar</button></a> / {!! Form::open(['method'=>'delete','action'=>['SubCuentaController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Borrar</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
