@extends('layouts.master')

@section('content')

    <h1>Crear nuevo Agente</h1>
    <hr/>

    {!! Form::open(['url' => 'agente', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('legajo', 'Legajo: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('legajo', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('dependencia_id', 'Dependencia: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('dependencia_id',$dependencia, null, ['class' => '']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('apellido', 'Apellido: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
        </div>
    </div><div class="form-group">
        {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        </div>
    </div><div class="form-group">
        {!! Form::label('dni', 'Dni: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('dni', null, ['class' => 'form-control']) !!}
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

@section('script')

  <script type="text/javascript">
      //inicia selectize en los comapos select
    $(function() {
        
        $('#dependencia_id').selectize({
          sortField: 'text'
        });

      });
  </script>

@endsection
