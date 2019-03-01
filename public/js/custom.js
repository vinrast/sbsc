
 $(document).ready(function() {

   /*
   * init pluggin iCheck
   */

   $('input').iCheck({
       checkboxClass: 'icheckbox_flat-green',
       radioClass: 'iradio_flat-green'
   });

   $('.select2').select2({
      placeholder: 'Seleccione una opción'
    });

 });
