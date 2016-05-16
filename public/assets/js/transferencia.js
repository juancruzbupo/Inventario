$(function() {
    $('#dependencia').selectize({
      sortField: 'text',
      onChange: function () {
        var select = $("#agente").selectize();
        var selectize = select[0].selectize;
        selectize.disable();

        select = $("#deposito").selectize();
        selectize = select[0].selectize;
        selectize.disable();
      }
    })
    
    $('#agente').selectize({
      sortField: 'text',
      onChange: function () {
        var select = $("#dependencia").selectize();
        var selectize = select[0].selectize;
        selectize.disable();

        select = $("#deposito").selectize();
        selectize = select[0].selectize;
        selectize.disable();
      }
    })

    $('#deposito').selectize({
      sortField: 'text',
      onChange: function () {
        
        var select = $("#dependencia").selectize();
        var selectize = select[0].selectize;
        selectize.disable();

        select = $("#agente").selectize();
        selectize = select[0].selectize;
        selectize.disable();
      }
    })

  });


$(function() {

    $('#btn_agregard').click(function () {

      var dato;

      if ($('#agente').prop("disabled") == false){
        
        $("#agente_id").val($(".item").text());

        $("#seleccion_id").val($("#agente").val());

        $("#tip_destino").val('3');

       }else{

        if ($('#dependencia').prop("disabled") == false){
          
          $("#agente_id").val($(".item").text());

          $("#seleccion_id").val($("#dependencia").val());

          $("#tip_destino").val('2');

        }else {

          $("#agente_id").val($(".item").text());

          $("#seleccion_id").val($("#deposito").val());

          $("#tip_destino").val('1');
        }

      }      
            
      $('#myModal1').modal('hide');

      var select = $("#dependencia").selectize();
      var selectize = select[0].selectize;
      selectize.clear();

      select = $("#agente").selectize();
      selectize = select[0].selectize;
      selectize.clear();

    });

    $('#codigo').change(function(){
      $.ajax({
          url: '/inventario/transferencia/validarCodigo',
          type: 'post',
          data: {'codigo': $(this).val(), '_token': $('input[name=_token]').val()},
          success: function (data) {
            
              if(data['repetido'] == 1){ // se repite p9

              $('#codigo').removeClass('valid');

              $('#codigo').addClass('alert-danger');

              $('#cod span').remove();

              $('#cod').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

            }else{

              $('#codigo').removeClass('alert-danger');

              $('#codigo').addClass('valid');

              $('#cod span').remove();

              $('#cod').append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
            
            }
          }
        });
    });

  });



