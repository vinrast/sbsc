
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();

  $('body').on( 'click', '.month', function(event) {
    event.preventDefault();
    var id = $(this).data('indicator');
    var month = $(this).data('month');
    var year = $('#year').children("option:selected").val();
    var url = url_global+"/clientes/nuevo/"+id;
    $.ajax({
      data:{ 'month':month, 'year':year },
      url:url,
      type:'post',
      beforeSend: showPreload(),
      success:function(respuesta){
        hidePreload();
        $("input[name=input_1]").val('');
        $("input[name=input_2]").val('');
        $('.form-group').removeClass('has-error');
        $('.help-block').hide();
        $('.modal-title').html(`<center><strong class="red">"${respuesta[0]}" <br> (${respuesta[1]} - ${year})</strong></center>`);
        $('.inputs_type').val(respuesta[5]);
        $('.indicator').val(respuesta[4]);
        $('.date').val(respuesta[2]);
        $('.threshold').val(respuesta[4]);
        $('.indicator').val(respuesta[3]);
        $('.date').val(respuesta[2]);
        $('.threshold').val(respuesta[4]);

        $(getModal(id)).modal('show');
      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
      }
    });
  });

  $('body').on('submit', '.save-form', function(event) {
    event.preventDefault();
    var indicator = $('.indicator').val();
    var formData = $(this).serializeArray();
    var url = url_global+"/clientes/almacenar/"+indicator;
    $.ajax({
      data:formData,
      url:url,
      type:'post',
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
        $('.form-group').removeClass('has-error');
        $('.help-block').hide();

        if ($(`#${respuesta[0].indicator_id}-${respuesta[1]}`).has('center').length) {
          $(`#${respuesta[0].indicator_id}-${respuesta[1]} center`).html(respuesta[0].label);
          if ($(`#${respuesta[0].indicator_id}-${respuesta[1]}`).attr('data-tooltip')) {
            $(`#${respuesta[0].indicator_id}-${respuesta[1]} center`).attr('data-original-title',respuesta[0].title);
          }
        } else{
          if ($(`#${respuesta[0].indicator_id}-${respuesta[1]}`).attr('data-tooltip')) {
            $(`#${respuesta[0].indicator_id}-${respuesta[1]}`).html(`
              <center  data-placement="left" data-html="true" data-toggle="tooltip"  title=''>
              ${respuesta[0].label}
              </center>
            `);
              $(`#${respuesta[0].indicator_id}-${respuesta[1]} center`).attr('data-original-title',respuesta[0].title).tooltip();

          } else {
            $(`#${respuesta[0].indicator_id}-${respuesta[1]}`).html(`
              <center  data-placement="left" data-html="true" data-toggle="tooltip"  title=''>
              ${respuesta[0].label}
              </center>
            `);
          }
        }
        new Noty({
            type: 'success',
            text: `<strong> Operación Exitosa!!!</strong> <br> El indicador <strong>${respuesta[0].indicator.name}</strong> para el mes de <strong>${respuesta[2]}</strong> fue actualizado correctamente.`,
        }).show();

        $(getModal(indicator)).modal('hide');
      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
      }
    });
  });


  $('.month').bind('contextmenu', function(e) {
    if ($(this).find(".label").length) {
      var month   = $(this).data('month');
      var indicator   = $(this).data('indicator');
      var year = $('#year').children("option:selected").val();
      var url = url_global+"/clientes/buscar-registro";
      $.ajax({
        data:{month:month, year:year, indicator:indicator},
        url:url,
        type:'post',
        beforeSend:showPreload(),
        success:function(respuesta){
          hidePreload();
          $('#date-delete').val(`${indicator}-${month}`);
          $('#register').val(respuesta[0]);
          $('.modal-title').html('<strong>Borrar Indicadores</strong>');
          $('#message-delete').html(`¿Está seguro de querer borrar el indicador
                                    <strong>${respuesta[1]}</strong> para el mes
                                    de <strong>${respuesta[2]}</strong>?`);
          $('#modal-delete').modal('show');
        },
        error: function(respuesta) {
          hidePreload();
          errors(respuesta);
        }
      });
    }
    return false;
  });

  $('body').on( 'click', '#confirm-delete', function(event) {
    var id=$('#register').val();
    var url= url_global+"/clientes/borrar/"+id;
    $.ajax({
      url:url,
      type:'post',
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
        $(`#${$('#date-delete').val()}`).empty();
        $('#modal-delete').modal('hide');

        new Noty({
            type: 'success',
            text: `<strong> Operación Exitosa!!!</strong> <br> El indicador <strong>${respuesta[0]}</strong> para el mes de <strong>${respuesta[1]}</strong> fue borrado correctamente.`,
        }).show();
      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
      }
    });
  })

});






function getModal(indicator)
{
  var modals = {
    1: '#modal-new-custommer', 2: '#modal-contracts-lost',
    3: '#modal-delayed-deliveries', 4:'#modal-increase-in-billing',
    5: '#modal-customer-rejection', 6: '#modal-customer-satisfaction',
    7: '#modal-price-variation'
  };

  return modals[indicator];
}
