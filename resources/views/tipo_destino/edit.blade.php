@extends('layouts.master')

@section('content')

    <h1>Editar Tipo Destino</h1>
    <hr/>

    {!! Form::model($tipo_destino, ['method' => 'PATCH', 'action' => ['TipoDestinoController@update', $tipo_destino->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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