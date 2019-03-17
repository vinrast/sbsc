
$(document).ready(function() {

  $('#perspective').change(function(event){
    event.preventDefault();
    var perspective = $('#perspective').children("option:selected").val();
    location.href = `${url_global}/ajustes/indicadores?search=${perspective}`;
  });

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
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
        $(this).val(respuesta);
        $(this).iCheck('update');
      },
      error: function(respuesta) {
        hidePreload();
        $(this).iCheck('toggle');
        errors(respuesta);
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
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
        $('.modal-title').html(`Editar Indicador <strong>"${respuesta.name}"</strong>`);
        $('#register').val(respuesta.id);
        $('#inputTarget').val(respuesta.target);
        $('#inputThreshold').val(respuesta.performance_threshold);
        $('.form-group').removeClass('has-error');
        $('.help-block').hide();
        $('#modal-edit-indicator').modal('show');
      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
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
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
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
        hidePreload();
        $('.form-group').removeClass('has-error');
        $('.help-block').hide();
        if( respuesta.status === 422 ) {
             if ( getAttr(respuesta.responseJSON.errors, 'target')) {
               $('#container-target-help').addClass('has-error');
               $('.target-help').show().html(`<strong>${ respuesta.responseJSON.errors.target[0] }</strong>`);
             }

             if ( getAttr(respuesta.responseJSON.errors, 'performance_threshold')) {
               $('#container-threshold-help').addClass('has-error');
               $('.threshold-help').show().html(`<strong>${ respuesta.responseJSON.errors.performance_threshold[0] }</strong>`);
             }

        } else if (respuesta.status === 419) {
             new Noty({
                 type: 'info',
                 text: `<strong> Sesión Agotada!!!</strong> <br> Su Sesión ha caducado
                        debe iniciar sesión nuevamente para poder realizar la acción.`,
                 timeout:4000,
             }).show();

             setTimeout(function(){ location.reload() }, 4200);

        } else{
              displayError();
        }
      }
    });
  });

});
