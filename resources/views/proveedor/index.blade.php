@extends('layouts.master')

@section('content')

    <h1>Proveedores <a href="{{ url('/proveedor/create') }}" class="btn btn-primary pull-right btn-sm">Crear Proveedor</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>SL.</th><th>Nombre</th><th>Accion</th>
            </tr>
            {{-- */$x=0;/* --}}
            @foreach($proveedores as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/proveedor', $item->id) }}">{{ $item->nombre }}</a></td>
                    <td><a href="{{ url('/proveedor/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Editar</button></a> / {!! Form::open(['method'=>'delete','action'=>['ProveedoreController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Borrar</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
