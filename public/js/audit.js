
$(document).ready(function() {

  $('body').on( 'submit', '#auditForm', function(event) {
    event.preventDefault();
    if (!$('#begin').val() || !$('#end').val() ) {
      new Noty({
          type: 'info',
          text: '<strong> Fechas Vacias.</strong> <br> Debe llenar los campos de fecha para la busqueda.',
      }).show();
    }else{
      if ($('#begin').val() > $('#end').val()) {
        new Noty({
            type: 'info',
            text: '<strong> Fecha Inicial Incorrecta.</strong> <br> La fecha inicial debe ser menor o igual a la final.',
        }).show();
      }else{
        event.currentTarget.submit();
      }
    }
  })

});
