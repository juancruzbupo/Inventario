@extends('layouts.master')

@section('content')

    <h1>Salida
    <a href="{{ url('/salida_material') }}" class="btn btn-primary pull-right btn-sm" style="margin-left:1%;">Volver</a>
    </h1>

    <hr/>

    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-3 control-label">Codigo:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $salida->id }}"  disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Fecha:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($salida->fecha)) }}" disabled="disabled">
            </div>
        </div>        
        <div class="form-group">
            <label class="col-sm-3 control-label">Destino:</label>
            @if($salida->agente != null)
                <div class="col-sm-6">
                     <input type="text" class="form-control" value="{{ $salida->agente->legajo }} - {{ $salida->agente->apellido }} {{ $salida->agente->nombre }}"  disabled="disabled">
                </div>
            @endif
            @if($salida->producto != null)
             <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $salida->producto->id }} - {{ $salida->producto->nombre }}"  disabled="disabled">
            </div>
            @endif
            @if($salida->deposito != null)
             <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $salida->deposito->id }} - {{ $salida->deposito->nombre }}"  disabled="disabled">
            </div>
            @endif
        </div>
    </div>

    <br>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th class="info">Sub Cuenta</th>
                <th class="info">Nombre</th>
                <th class="info">Marca</th>
                <th class="info">Modelo</th>
                <th class="info">Nro Serie</th>
                <th class="info">Nro Patrimonio</th>
                <th class="info">Detalle</th>
                <th class="info">Importe</th>
                <th class="info">Accion</th>
            </thead>
            <tbody>
                @foreach($salida->productos as $item)
                <tr  class="active">
                <td>{{ $item->subcuenta->nombre }}</td>
                <td> {{ $item->nombre }}</td>
                <td> {{ $item->marca->nombre }}</td>
                <td> {{ $item->modelo->nombre }}</td>
                <td> {{ $item->nro_serie }}</td>
                <td> {{ $item->id_patrimonial }}</td>
                <td> {{ $item->detalle }}</td>
                <td> {{ $item->importe }}</td>
                <td><a href="{{ url('/producto/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Editar</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
