
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
      placeholder: 'Seleccione una opción'
    });

 });
