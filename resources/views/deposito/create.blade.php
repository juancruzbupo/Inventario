@extends('layouts.master')

@section('content')

    <h1>Crear nuevo Deposito</h1>
    <hr/>

    {!! Form::open(['url' => 'deposito', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('agente_id', 'Encargado: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('agente_id',$agente, null, ['class' => '']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('dependencia_id', 'Dependencia: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('dependencia_id',$dependencia, null, ['class' => '']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
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


@section('script')

  {!! Html::script('public/assets/js/deposito.js') !!}

@endsection
