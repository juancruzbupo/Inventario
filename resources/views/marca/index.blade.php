@extends('layouts.master')

@section('content')

    <h1>Marcas <a href="{{ url('/marca/create') }}" class="btn btn-primary pull-right btn-sm">Crear Marca</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>SL.</th><th>Nombre</th><th>Accion</th>
            </tr>
            {{-- */$x=0;/* --}}
            @foreach($marcas as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/marca', $item->id) }}">{{ $item->nombre }}</a></td>
                    <td><a href="{{ url('/marca/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Editar</button></a> / {!! Form::open(['method'=>'delete','action'=>['MarcaController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Borrar</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
