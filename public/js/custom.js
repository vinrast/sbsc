
 $(document).ready(function() {

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
