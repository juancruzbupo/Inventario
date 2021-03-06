@extends('layouts.master')

@section('content')

    <h1>Editar Carga <a href="{{ url('/carga') }}" class="btn btn-primary pull-right btn-sm">Volver</a></h1>
    <hr/>

    {!! Form::model($carga, ['method' => 'PATCH', 'action' => ['CargaController@update', $carga->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
                        <div class="form-group">
                        {!! Form::label('cod_p9', 'Cod P9: ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6" id='p9'>
                            {!! Form::text('cod_p9', null, ['class' => 'form-control']) !!}
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


@section('script')

  {!! Html::script('public/assets/js/carga.js') !!}

@endsection
