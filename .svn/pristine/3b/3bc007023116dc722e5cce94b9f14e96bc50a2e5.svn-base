@extends('layouts.master')

@section('content')

    <h1>Productos <a href="{{ url('/producto/create') }}" class="btn btn-primary pull-right btn-sm">Crear Producto</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>SL.</th><th>Marca</th><th>Modelo</th><th>Accion</th>
            </tr>
            {{-- */$x=0;/* --}}
            @foreach($productos as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/producto', $item->id) }}">{{ $item->marca_id }}</a></td><td>{{ $item->modelo_id }}</td>
                    <td><a href="{{ url('/producto/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Editar</button></a> / {!! Form::open(['method'=>'delete','action'=>['ProductoController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Borrar</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
