@extends('layouts.master')

@section('content')

    <h1>Dependencias <a href="{{ url('/dependencia/create') }}" class="btn btn-primary pull-right btn-sm">Crear Dependencia</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>SL.</th><th>Nombre</th><th>Es Int</th><th>Accion</th>
            </tr>
            {{-- */$x=0;/* --}}
            @foreach($dependencias as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/dependencia', $item->id) }}">{{ $item->nombre }}</a></td><td>{{ $item->es_int }}</td>
                    <td><a href="{{ url('/dependencia/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Editar</button></a> / {!! Form::open(['method'=>'delete','action'=>['DependenciaController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Borrar</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
