
$(document).ready(function() {

  $('input').on('ifClicked', function(event){
    if ($(this).hasClass('special')) {
      if($(this).prop('checked')){
        $(this).prop('checked',false);
        $(this).parent().removeClass('checked');
      }
    }
  });

  $('body').on( 'click', '.delete-role-btn', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $('#register').val(id);
      $('.modal-title').html('<strong>Borrar Usuarios</strong>');
    $('#message-delete').html('¿Está seguro de querer borrar el usuario seleccionado?');
    $('#modal-delete').modal('show');
  })

  $('body').on( 'click', '#confirm-delete', function(event) {
    var id=$('#register').val();
    location.href = url_global+"/ajustes/usuarios/eliminar/"+id;
  })
});

function create()
{
  location.href = url_global+"/ajustes/usuarios/crear";
}

function back()
{
  location.href = url_global+"/ajustes/usuarios/";
}
