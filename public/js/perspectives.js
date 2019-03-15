
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
        // $(`#target${respuesta.id}`).html(respuesta.target);
        // $(`#threshold${respuesta.id}`).html(respuesta.threshold);
        // $(`#negative${respuesta.id}`).html(`${ respuesta.graphic_type ? '<=' : '>' } ${ respuesta.limit.negative }`);
        // $(`#average${respuesta.id}`).html(`${ respuesta.graphic_type ? '>' : '>' } ${ respuesta.limit.average }`);
        // $(`#positive${respuesta.id}`).html(`${ respuesta.graphic_type ? '>' : '<=' } ${ respuesta.limit.positive }`);
        // new Noty({
        //     type: 'success',
        //     text: `<strong> Operación Exitosa!!!</strong> <br> El indicador <strong>${respuesta.name}</strong> fue actualizado correctamente.`,
        // }).show();
      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
      }
    });
  });


  $('.month').bind('contextmenu', function(e) {
    if ($(this).find(".label").length) {
      $(getModal(1)).modal('show');
    }
    return false;
  });

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
