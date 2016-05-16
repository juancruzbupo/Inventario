@extends('layouts.master')

@section('content')

    <h1>Crear nueva Subcuenta</h1>
    <hr/>

    {!! Form::open(['url' => 'subcuenta', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
                        {!! Form::label('cuenta_codigo', 'Cuenta Codigo: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('cuenta_codigo',$cuenta, null, array('class'=>'form-control')) !!}
                        </div>

                    </div><div class="form-group">
                        {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        {!! Form::label('stock', 'Stock: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('stock', null, ['class' => 'form-control']) !!}
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
