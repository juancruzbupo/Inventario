@extends('layouts.master')

@section('content')

    <h1>Crear Salida Material <a href="{{ url('/salida_material') }}" class="btn btn-primary pull-right btn-sm">Ver Salida</a></h1>
    <hr/>

    {!! Form::open(['url' => 'salida_material', 'class' => 'form-horizontal' ,'id' => 'frm-example']) !!}

    <div class="form-group">                    
        {!! Form::label('fecha', 'Fecha: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('agente_id', 'Destino: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('agente_id', null, ['class' => 'form-control']) !!}
            {!! Form::hidden('seleccion_id', null, array('id' => 'seleccion_id')) !!}
        </div>
        <div>
            <button type="button"  data-toggle="modal" data-target="#myModal1" class="btn btn-primary pull-left">Seleccionar</button>
        </div>
        {!! Form::hidden('tip_destino', null, array('id' => 'tip_destino')) !!}
    </div>

    <br>

    <h4> - Seleccion de Productos -</h4>

    <hr><br>

    <div class="table">
      <table id="example" class="display select" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th></th>
              <th>Nombre</th>
              <th>Nro Serie</th>
              <th>Nro Patrimonio</th>
              <th>Ubicacion</th>
              <th>Detalle</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th></th>
              <th>Nombre</th>
              <th>Nro Serie</th>
              <th>Nro Patrimonio</th>
              <th>Ubicacion</th>
              <th>Detalle</th>
            </tr>
        </tfoot>

      </table>
    </div>


    <br><br>
    <div class="form-group">
        <div class="col-sm-3">
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

    @include('salida_material._mdestino')

@endsection

@section('script')

  {!! Html::script('public/assets/js/salida.js') !!}

  <script>
  
  $(document).ready(function (){
     // Array holding selected row IDs
     var rows_selected = [];
     var table = $('#example').DataTable({
        language: {
            processing:     "Proceso en curso...",
            search:         "Buscar&nbsp;:",
            lengthMenu:    "Paginacion&nbsp _MENU_",
            info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty:      "Ningún dato disponible en esta tabla",
            paginate: {
                first:      "",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       ""
            }
        },
        'ajax': '{!! action("SalidaMaterialController@datatables") !!}',
        'columnDefs': [{
           'targets': 0,
           'searchable': false,
           'orderable': false,
           'width': '1%',
           'className': 'dt-body-center',
           'render': function (data, type, row , meta){
               return '<input type="checkbox" value= ' + data + '>';
           }
        }],
          columns: [
              { data: 'id', name: 'id'},
              { data: 'nombre', name: 'nombre'},
              { data: 'nro_serie', name: 'nro_serie'},
              { data: 'id_patrimonial', name: 'id_patrimonial'},
              { data: 'ubicacion', name: 'ubicacion'},
              { data: 'detalle', name: 'detalle'}
              ],
        'order': [[1, 'asc']],
        'rowCallback': function(row, data, dataIndex){
           // Get row ID
           var rowId = data[0];

        }
     });

     // Handle click on checkbox
     $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        // Get row data
        var data = table.row($row).data();

        // Get row ID
        var rowId = data[0];

        // Determine whether row ID is in the list of selected row IDs 
        var index = $.inArray(rowId, rows_selected);

        // If checkbox is checked and row ID is not in list of selected row IDs
        if(this.checked && index === -1){
           rows_selected.push(rowId);

        // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
        } else if (!this.checked && index !== -1){
           rows_selected.splice(index, 1);
        }

        if(this.checked){
           $row.addClass('selected');
        } else {
           $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
     });

     // Handle click on table cells with checkboxes
     $('#example').on('click', 'tbody td, thead th:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
     });

     // Handle click on "Select all" control
     $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
        if(this.checked){
           $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
        } else {
           $('#example tbody input[type="checkbox"]:checked').trigger('click');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
     });




        // Handle form submission event
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         
          // If checkbox is checked
          if(this.checked){
             // Create a hidden element 
             $(form).append(
                $('<input>')
                   .attr('type', 'hidden')
                   .attr('name', 'id[]')
                   .val(this.value)
             );
          }

      });
   });

  });




  </script>

@endsection


