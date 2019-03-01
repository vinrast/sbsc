
$(document).ready(function() {

  $('body').on( 'click', '.delete-department-btn', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $('#register').val(id);
    $('.modal-title').html('<strong>Borrar Departamentos</strong>');
    $('#message-delete').html('¿Está seguro de querer borrar el departamento seleccionado?');
    $('#modal-delete').modal('show');
  })

  $('body').on( 'click', '#confirm-delete', function(event) {
    var id=$('#register').val();
    location.href = url_global+"ajustes/departamentos/eliminar"+id;
  })
});

function create()
{
  location.href = url_global+"/ajustes/departamentos/crear";
}

function back()
{
  location.href = url_global+"/ajustes/departamentos";
}
