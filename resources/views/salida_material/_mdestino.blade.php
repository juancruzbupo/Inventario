  <!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Seleccionar Destino</h4>
      </div>
       {!! Form::open(['url' => 'carga', 'class' => 'form-horizontal carga', 'id'=>'form-agregar']) !!}
      <div class="modal-body">

        <div class="form-group">
            {!! Form::label('agente','Agente: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">{!! Form::select('agente',$agente, null, array('class'=>'')) !!}  </div>
        </div>
        <hr>
        <div class="form-group">
            {!! Form::label('deposito','Deposito: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">{!! Form::select('deposito',$deposito, null, array('class'=>'')) !!}  </div>
        </div>

        <hr>
        <div class="form-group">
            {!! Form::label('producto','Producto: ', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">{!! Form::select('producto',$producto, null, array('class'=>'')) !!}  </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="btn_agregard">Agregar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        </div>

      </div>
      {!! Form::close() !!}
  
    </div>
  </div>
</div>
