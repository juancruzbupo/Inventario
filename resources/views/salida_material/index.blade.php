@extends('layouts.master')

@section('content')

    <h1>Salida Material <a href="{{ url('/salida_material/create') }}" class="btn btn-primary pull-right btn-sm">Crear Salida</a></h1>

    <hr/>

    <div class="table">
        <table id="example" class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha</th>
                    <th>Destino</th>
                    <th>Accion</th>
                </tr>
            </thead>
        </table>
    </div>

@endsection

@section('script')

<script>

$(document).ready(function() {



    $('#example').DataTable({
          processing: true,
          serverSide: true,
          searching: true,
          autoWidth: true,
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
          ajax: '{!! action("SalidaMaterialController@indextables") !!}',
          columns: [
                { data: 'codigo', name: 'codigo','orderable': true, 'searchable': true},
                { data: 'fecha', name: 'fecha','orderable': true, 'searchable': true},
                { data: 'destino', name: 'destino','orderable': true, 'searchable': true},
                {data: 'action', name: 'action', orderable: true, searchable:true }
          ]
    });

});

</script>



@endsection