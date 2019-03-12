
$(document).ready(function() {

  $('input').on('ifClicked', function(event){
    event.preventDefault();
    var id = $(this).attr('id');
    var val = $(this).val();
    var url = url_global+"/ajustes/indicadores/activar/"+id;
    $.ajax({
      data:{val:val},
      url:url,
      type:'post',
      context: $(this),
      success:function(respuesta){
        $(this).iCheck('update');
      },
      error: function() {
        $(this).iCheck('toggle');
        displayError();
      }
    });
  });

  $('body').on( 'click', '.indicators-edit', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    var url = url_global+"/ajustes/indicadores/editar/"+id;
    $.ajax({
      url:url,
      type:'get',
      success:function(respuesta){
        $('.modal-title').html(`Editar Indicador <strong>"${respuesta.name}"</strong>`);
        $('#register').val(respuesta.id);
        $('#inputTarget').val(respuesta.target);
        $('#inputThreshold').val(respuesta.performance_threshold);
        $('.form-group').removeClass('has-error');
        $('.help-block').hide();
        $('#modal-edit-indicator').modal('show');
      },
      error: function() {
        displayError();
      }
    });
  });

  $('body').on('submit', '#edit-form', function(event) {
    event.preventDefault();
    var id = $('#register').val();
    var formData = $('#edit-form').serializeArray();
    var url = url_global+"/ajustes/indicadores/actualizar/"+id;
    $.ajax({
      data:formData,
      url:url,
      type:'post',
      success:function(respuesta){
        $('.form-group').removeClass('has-error');
        $('.help-block').hide();
        $(`#target${respuesta.id}`).html(respuesta.target);
        $(`#threshold${respuesta.id}`).html(respuesta.threshold);
        $(`#negative${respuesta.id}`).html(`${ respuesta.graphic_type ? '<=' : '>' } ${ respuesta.limit.negative }`);
        $(`#average${respuesta.id}`).html(`${ respuesta.graphic_type ? '>' : '>' } ${ respuesta.limit.average }`);
        $(`#positive${respuesta.id}`).html(`${ respuesta.graphic_type ? '>' : '<=' } ${ respuesta.limit.positive }`);
        new Noty({
            type: 'success',
            text: `<strong> Operación Exitosa!!!</strong> <br> El indicador <strong>${respuesta.name}</strong> fue actualizado correctamente.`,
        }).show();
      },
      error: function(respuesta) {
        if( respuesta.status === 422 ) {
             if ( getAttr(respuesta.responseJSON.errors, 'target')) {
               $('#container-target-help').addClass('has-error');
               $('.target-help').show().html(`<strong>${ respuesta.responseJSON.errors.target[0] }</strong>`);
             }

             if ( getAttr(respuesta.responseJSON.errors, 'performance_threshold')) {
               $('#container-threshold-help').addClass('has-error');
               $('.threshold-help').show().html(`<strong>${ respuesta.responseJSON.errors.performance_threshold[0] }</strong>`);
             }

          }
          else{
              displayError();
          }
      }
    });
  });

});

function displayError()
{
  new Noty({
      type: 'error',
      text: '<strong> Error!!! <br> Algo sucedio en el servidor.</strong> <br> Intentelo de nuevo mas tarde.',
  }).show();
}

function getAttr(obj, keyToFind){
  var i = 1, key;

  for (key in obj) {
    if (key == keyToFind) {
        return i;
    }
    i++;
  }
  return null;
}
