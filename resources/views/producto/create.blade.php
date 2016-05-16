@extends('layouts.master')

@section('content')

    <h1>Crear nuevo Productos</h1>
    <hr/>

    {!! Form::open(['url' => 'producto', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
                        {!! Form::label('marca_id', 'Marca: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('marca_id',$marca, null, array('class'=>'form-control')) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('modelo_id', 'Modelo: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('modelo_id',$modelo, null, array('class'=>'form-control')) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('nro_serie', 'Nro Serie: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nro_serie', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('id_patrimonial', 'Id Patrimonio: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('id_patrimonial', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('fecha_alta', 'Fecha Alta: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::date('fecha_alta', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('fecha_baja', 'Fecha Baja: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::date('fecha_baja', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                            {!! Form::label('subcuenta_id', 'Subcuenta: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('subcuenta_id',$subcuenta, null, array('class'=>'form-control')) !!}
                        </div>
                    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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
