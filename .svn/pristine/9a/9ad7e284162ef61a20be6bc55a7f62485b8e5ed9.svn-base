@extends('layouts.master')

@section('content')

    <h1>Editar Producto <a href="{{ url('/carga/' . $producto->carga_id) }}" class="btn btn-primary pull-right btn-sm">Volver</a></h1>
    <hr/>

    {!! Form::model($producto, ['method' => 'PATCH', 'action' => ['ProductoController@update', $producto->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
       <div class="form-group">
        
            {!! Form::label('nro_serie', 'Nro Serie: ', ['class' => 'col-sm-3 control-label']) !!}
            
            <div class="col-sm-6">
                {!! Form::text('nro_serie', null, ['class' => 'form-control']) !!}
            </div>
        
        </div>

        <div class="form-group">
            
            {!! Form::label('id_patrimonial', 'Id Patrimonio: ', ['class' => 'col-sm-3 control-label']) !!}
            
            <div class="col-sm-6">
                {!! Form::text('id_patrimonial', null, ['class' => 'form-control']) !!}
            </div>

        </div>

    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
