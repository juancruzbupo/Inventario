@extends('layouts.master')

@section('content')

    <h1>Producto <a href="{{ url('/stock') }}" class="btn btn-primary pull-right btn-sm" style="margin-left:1%;">Volver</a></h1>
    <hr>
      <div class="form-horizontal">
      <!--<div class="form-group">
            <label class="col-sm-3 control-label">ID:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $producto->id }}"  disabled="disabled">
            </div>
        </div>-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Nombre:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $producto->nombre }}"  disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Ubicacion:</label>
             @if($producto->tip_destino == 1)
                <div class="col-sm-6">
                     <input type="text" class="form-control" value="{{ $ubicacion->nombre }}"  disabled="disabled">
                </div>
            @endif

            @if($producto->tip_destino == 2)
                <div class="col-sm-6">
                     <input type="text" class="form-control" value="Departamento {{ $ubicacion->nombre }}"  disabled="disabled">
                </div>
            @endif

            @if($producto->tip_destino == 3)
                <div class="col-sm-6">
                     <input type="text" class="form-control" value="{{ $ubicacion->legajo }} {{ $ubicacion->apellido }} {{ $ubicacion->nombre }}"  disabled="disabled">
                </div>
            @endif

            @if($producto->tip_destino == 4)
                <div class="col-sm-6">
                     <input type="text" class="form-control" value="{{ $ubicacion->id_patrimonial }} - {{ $ubicacion->nombre }}"  disabled="disabled">
                </div>
            @endif

        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Numero Patrimonio:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $producto->id_patrimonial }}"  disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Numero Serie:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $producto->nro_serie }}"  disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Fecha de Alta:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($producto->fecha_alta)) }}" disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Proveedor:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $producto->carga->proveedor->nombre }}"  disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Precio:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="$ {{ $producto->importe }}"  disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Cod P9:</label>
            <div class="col-sm-6">
                 <input type="text" class="form-control" value="{{ $producto->carga->cod_p9 }}"  disabled="disabled">
            </div>
        </div>
    </div>

@endsection
