@extends('layouts.master')

@section('content')

    <h1>Cargas <a href="{{ url('/carga/create') }}" class="btn btn-primary pull-right btn-sm">Crear Carga</a></h1>

    <hr>

    <div class="table">
        <table id="example" class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th>Fecha Carga</th>
                    <th>Tipo Comp</th>
                    <th>Nro</th>
                    <th>Cod P9</th>
                    <th>Importe</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Fecha Carga</th>
                    <th>Tipo Comp</th>
                    <th>Nro</th>
                    <th>Cod P9</th>
                    <th>Importe</th>
                    <th>Accion</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection

@section('script')

<script>

$(document).ready(function() {

    $('#example').DataTable({
          processing: true,
          serverSide: true,
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
          ajax: '{!! action("CargaController@datatables") !!}',
          columns: [
                { data: 'fecha', name: 'fecha'},
                { data: 'tipo_comp', name: 'tipo_comp'},
                { data: 'nro', name: 'nro'},
                { data: 'cod_p9', name: 'cod_p9'},
                { data: 'importe', name: 'importe'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
          ],
          initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      var val = $.fn.dataTable.util.escapeRegex($(this).val());

                      column.search(val ? val : '', true, false).draw();
                  });
              });
          }
    });

});

</script>



@endsection
