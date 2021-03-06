
 $(document).ready(function() {
   $('li').each(function(index) {
     if ($(this).hasClass('treeview')) {
       $(this).find('a').each(function(index) {
         if(window.location.href.indexOf($(this).attr('href')) != -1){
            $(this).parent().addClass('active');
            $(this).parent().parent().parent().addClass('active menu-open');
         }
       });
     }else{
       if(window.location.href.indexOf($(this).find('a').attr('href')) != -1){
          $(this).find('a').parent().addClass('active');
       }
     }
   });

   $.ajaxSetup({
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   $('input').iCheck({
       checkboxClass: 'icheckbox_flat-green',
       radioClass: 'iradio_flat-green'
   });

   $('.select2').select2({
      width: '100%',
      placeholder: 'Seleccione una opción',
      "language": {
       "noResults": function(){
           return "No existen coincidencias con la búsqueda";
           }
       },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

 });

 function displayError()
 {
   new Noty({
       type: 'error',
       text: '<strong> Error!!! <br> Algo sucedio en el servidor.</strong> <br> Intentelo de nuevo mas tarde.',
   }).show();
 }

 function showPreload()
 {
   $('#preloader').show();
 }

 function hidePreload()
 {
   $('#preloader').hide();
 }

 function getAttr(obj, keyToFind)
 {
   var i = 1, key;

   for (key in obj) {
     if (key == keyToFind) {
         return i;
     }
     i++;
   }
   return null;
 }

 function errors(respuesta)
 {
   $('.form-group').removeClass('has-error');
   $('.container').removeClass('has-error');
   $('.help-block').hide();

   if( respuesta.status === 422 ) {
        if ( getAttr(respuesta.responseJSON.errors, 'input_1')) {
          $('.container-input_1-help').addClass('has-error');
          $('.input_1-help').show().html(`<strong>${ respuesta.responseJSON.errors.input_1[0] }</strong>`);
        }

        if ( getAttr(respuesta.responseJSON.errors, 'input_2')) {
          $('.container-input_2-help').addClass('has-error');
          $('.input_2-help').show().html(`<strong>${ respuesta.responseJSON.errors.input_2[0] }</strong>`);
        }

        if ( getAttr(respuesta.responseJSON.errors, 'input_3')) {
          $('.container-input_3-help').addClass('has-error');
          $('.input_3-help').show().html(`<strong>${ respuesta.responseJSON.errors.input_3[0] }</strong>`);
        }

   }
   else if (respuesta.status === 419) {
     new Noty({
         type: 'info',
         text: `<strong> Sesión Agotada!!!</strong> <br> Su Sesión ha caducado
                debe iniciar sesión nuevamente para poder realizar la acción.`,
         timeout:4000,
     }).show();

     setTimeout(function(){ location.reload() }, 4200);
   }
   else if (respuesta.status === 403) {
     new Noty({
         type: 'info',
         text: `<strong> Acción no permitida!!!</strong> <br> Su rol
                no tiene permiso para realizar esta accion, pongase
                en contacto con el administrador del sistema.`,
         timeout:4000,
     }).show();
   }
   else if (respuesta.status === 412) {
     new Noty({
         type: 'info',
         text: `<strong> Acción no permitida!!!</strong> <br> Esta seleccionando fechas
                mayores a la fecha actual. Intente con fechas anteriores`,
         timeout:4000,
     }).show();
   }
   else{

     displayError();
   }
 }
