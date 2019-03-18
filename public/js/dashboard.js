
$(document).ready(function() {
  $('#indicators').select2({
    placeholder: 'Seleccione un indicador de lista',
    "language": {
     "noResults": function(){
         return "No existen coincidencias con la búsqueda";
         }
     },
      escapeMarkup: function (markup) {
          return markup;
      }
  });
  $('#years').select2({
    placeholder: 'Seleccione el año disponible',
    "language": {
     "noResults": function(){
         return "No coincide ningun año";
         }
     },
      escapeMarkup: function (markup) {
          return markup;
      }
  });

  $('body').on( 'change', '#indicators', function(event) {
    event.preventDefault();
    var id = $('#indicators').children("option:selected").val();
    var url = url_global+"/buscar-ano/"+id;
    $.ajax({
      url:url,
      type:'post',
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
        $('.opcion').remove();
        $.each(respuesta, function(e){
          $('#years').append("<option value="+respuesta[e]+" class='opcion' >"+respuesta[e]+"</option>");
        });
      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
      }
    });
  });

  $('body').on('submit', '#generateCharts', function(event) {
    event.preventDefault();
  })

});
