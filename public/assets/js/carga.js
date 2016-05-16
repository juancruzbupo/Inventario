//inicia selectize en los comapos select
$(function() {
    
    $('#tipo_comp').selectize({
      sortField: 'text'
    })

    $('#proveedor').selectize({
      sortFiel: 'text'
    });

    $('#cuenta').selectize({
      sortFiel: 'text'
    });

    $('#marca').selectize({
      sortFiel: 'text'
    });

    $('#modelo').selectize({
      sortFiel: 'text'
    });
    
    $('#deposito').selectize({
      sortFiel: 'text'
    });

  });

function borrarfila(i){
  $("#del-"+i).remove();
}

$(function() {

    $('#btn_agregar').click(function () {

      /*** VALIDACIONES ***/

      if ($("#sub_cuenta").val() == 0){
        alert("Debe seleccionar una sub cuenta");
        return;
      }

      if ($("#nombre").val() == ""){
        alert("Debe ingresar un nombre");
        return;
      }

      if ($("#marca").val() == 0){
        alert("Debe seleccionar una marca");
        return;
      }

      
      if ($("#cantidad").val() == ""){
        alert("Debe ingresar cantidad");
        return;
      }

      if ($("#importe").val() == ""){
        alert("Debe ingresar un importe");
        return;
      }

      /*** Armo la tabla***/
      var cant = $("#cantidad").val();

      var i;
      for (i = 1; i <= cant; i++) {
        var nro_fila = $('#tabla_carga >tbody >tr').length + 1; //contar el ultimo de la tabla
        html=
        "<tr id='del-" + $("#sub_cuenta").val() + i + "'>"+
          "<td><input name='subcuenta[]' value= '"+ $("#sub_cuenta").val() + "' readOnly='readOnly' class='form-control'></td>"+
          "<td><input name='nombre[]' value= '"+ $("#nombre").val()     + "' readOnly='readOnly' class='form-control'></td>"+
          "<td><input name='marca[]' value= '"+ $("#marca").val()     +  "' readOnly='readOnly' class='form-control'></td>"+
          "<td><input name='modelo[]' value= '"+ $("#modelo").val()     +"' readOnly='readOnly' class='form-control'></td>"+
          "<td><input name='nro_serie[]' value= '"+ $("#nro_serie").val()  +"' class='form-control'></td>"+
          "<td><input id='nro_patrimonio[" + nro_fila + "]' name='nro_patrimonio[]' value='' class='form-control ' onchange='n_pat(" + nro_fila + ")'></td>"+
          "<td><input name='detalle[]' value= '"+ $("#detalle").val()    +"' readOnly='readOnly' class='form-control'></td>"+
          "<td><input name='cantidad[]' value= '"+ 1    +"' readOnly='readOnly' class='form-control'></td>"+
          "<td><input name='importe[]' value= '"+ $("#importe").val()    +"' readOnly='readOnly' class='form-control'></td>"+
          "<td><a id='btn_borrar_cuenta' onClick='borrarfila(" + $("#sub_cuenta").val() + i + ");' class='btn btn-default glyphicon glyphicon-trash'></a></td>"+
        "</tr>";
        $("#tabla_carga").append(html);
      }
      $('#myModal').modal('hide');
    });

    $('#cod_p9').change(function(){
      $.ajax({
        url: '/inventario/carga/validarP9',
        type: 'post',
        data: {'p9': $(this).val(), '_token': $('input[name=_token]').val()},
        success: function(data){
          $('#cod_p9').empty();

          if(data['repetido'] == 1){ // se repite p9

            $('#cod_p9').removeClass('valid');

            $('#cod_p9').addClass('alert-danger');

            $('#p9 span').remove();

            $('#p9').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

          }else{

            $('#cod_p9').removeClass('alert-danger');

            $('#cod_p9').addClass('valid');

            $('#p9 span').remove();

            $('#p9').append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
          
          }
        }
      });
    });
});

//valida numero patrimonial carga
function n_pat(id){
  $.ajax({
    url: '/inventario/carga/validarNp',
    type: 'post',
    data: {'np': document.getElementById("nro_patrimonio[" + id + "]").value,'id': id ,'_token': $('input[name=_token]').val()},
    success: function(data){
      
      if(data['repetido'] == 1){ // se repite p9

            document.getElementById("nro_patrimonio[" + data['id'] + "]").className = '';

            document.getElementById("nro_patrimonio[" + data['id'] + "]").className += 'form-control alert-danger';

            document.getElementById("nro_patrimonio[" + data['id'] + "]").innerHTML += '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';

          }else{

            document.getElementById("nro_patrimonio[" + data['id'] + "]").className = '';

            document.getElementById("nro_patrimonio[" + data['id'] + "]").className += 'form-control valid';

            siguiente_id = 1 + parseInt(data['id']);

            if(document.getElementById("nro_patrimonio[" + siguiente_id + "]") != null){
              
              document.getElementById("nro_patrimonio[" + siguiente_id + "]").focus();  
            
            }

          }
    }
  });
}

$('.carga .select').change(function(){
  $.ajax({
    url: '/inventario/carga/create',
    type: "post",
    data: {'codigo': $(this).val(), '_token': $('input[name=_token]').val()},
    success: function (data) {
      if (data.length == 1){
        $(".subcuenta").prop('disabled', true);

        $('.subcuenta').empty();

        $('.subcuenta').append("<option value='" + '' + "'>" + 'Seleccionar Cuenta...' + "</option>");
      }else{
        $(".subcuenta").prop('disabled', false);

        $('.subcuenta').removeClass('selectize-input');
        
        var options = [];

        $.each(data, function(key, element) {
          options.push({
            id: key,
            nombre: element
          });
        });

        var select =
            $('#sub_cuenta').selectize({
              valueField: 'id',
              labelField: 'nombre',
              searchField: 'nombre',
              options: options,
            });
      }
    }
  });
});