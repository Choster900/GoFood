$(document).ready(function () {
    console.log('estamos en Xd');
    compras()
    function compras(){
        $.ajax({
            type : 'POST',
            url : url+'orders/MostrarCompras',
            success:function (response) {
                $("#table tbody").html(response);
                
            },
            error:function () {
                    
            }
        })
    }
    $('body').on('click','#btnEliminar', function(event){
        event.preventDefault()
        var href = $(this).attr('href')
        console.log(href)
        Swal.fire({
        title: 'Quieres Eliminar el registro? NO SE VOLVERA A RECUPERAR',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Delete`,
        denyButtonText: `Don't Delete`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method : 'GET',
                url : href,
                success : function(){
                    // console.log(response)
                    compras()
                },
                error: function(){
                    console.log('Error al procesar AJAX')
                }
            })
          Swal.fire('Saved!', '', 'success')
        } else if (result.isDenied) {

          Swal.fire('Changes are not saved', '', 'info')
        }
      })
    })
});