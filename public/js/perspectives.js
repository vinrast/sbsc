
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();

  $('body').on( 'click', '.month', function(event) {
    event.preventDefault();
    var id = $(this).data('indicator');
    var month = $(this).data('month');


    var url = url_global+"/clientes/nuevo/"+id;
    $.ajax({
      data:{ 'month':month },
      url:url,
      type:'post',
      success:function(respuesta){
        var year = $('#year').children("option:selected").val();
        $('.modal-title').html(`<center><strong class="red">"${respuesta[0]}" <br> (${respuesta[1]} - ${year})</strong></center>`);
        // $('#register').val(respuesta.id);
        // $('#inputTarget').val(respuesta.target);
        // $('#inputThreshold').val(respuesta.performance_threshold);
        // $('.form-group').removeClass('has-error');
        // $('.help-block').hide();
        $(getModal(id)).modal('show');
      },
      error: function(respuesta) {
        if (respuesta.status === 403) {
          new Noty({
              type: 'info',
              text: `<strong> Acción no permitida!!!</strong> <br> Su rol
                     no tiene permiso para realizar esta accion, pongase
                     en contacto con el administrador del sistema.`,
              timeout:4000,
          }).show();
        }else{
          displayError();
        }
      }
    });
  });

  // $('body').on('submit', '#edit-form', function(event) {
  //   event.preventDefault();
  //   var id = $('#register').val();
  //   var formData = $('#edit-form').serializeArray();
  //   var url = url_global+"/ajustes/indicadores/actualizar/"+id;
  //   $.ajax({
  //     data:formData,
  //     url:url,
  //     type:'post',
  //     success:function(respuesta){
  //       $('.form-group').removeClass('has-error');
  //       $('.help-block').hide();
  //       $(`#target${respuesta.id}`).html(respuesta.target);
  //       $(`#threshold${respuesta.id}`).html(respuesta.threshold);
  //       $(`#negative${respuesta.id}`).html(`${ respuesta.graphic_type ? '<=' : '>' } ${ respuesta.limit.negative }`);
  //       $(`#average${respuesta.id}`).html(`${ respuesta.graphic_type ? '>' : '>' } ${ respuesta.limit.average }`);
  //       $(`#positive${respuesta.id}`).html(`${ respuesta.graphic_type ? '>' : '<=' } ${ respuesta.limit.positive }`);
  //       new Noty({
  //           type: 'success',
  //           text: `<strong> Operación Exitosa!!!</strong> <br> El indicador <strong>${respuesta.name}</strong> fue actualizado correctamente.`,
  //       }).show();
  //     },
  //     error: function(respuesta) {
  //       if( respuesta.status === 422 ) {
  //            if ( getAttr(respuesta.responseJSON.errors, 'target')) {
  //              $('#container-target-help').addClass('has-error');
  //              $('.target-help').show().html(`<strong>${ respuesta.responseJSON.errors.target[0] }</strong>`);
  //            }
  //
  //            if ( getAttr(respuesta.responseJSON.errors, 'performance_threshold')) {
  //              $('#container-threshold-help').addClass('has-error');
  //              $('.threshold-help').show().html(`<strong>${ respuesta.responseJSON.errors.performance_threshold[0] }</strong>`);
  //            }
  //
  //         }
  //         else{
  //             displayError();
  //         }
  //     }
  //   });
  // });

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
