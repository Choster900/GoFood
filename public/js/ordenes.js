$(document).ready(function () {
    console.log(url);

    ordenes()
    function ordenes(){
        $.ajax({
            type : 'POST',
            url : url+'orders/factura',
            success:function (response) {
                $("#table tbody").html(response);
                
            },
            error:function () {
                    
            }
        })
    }
    $('body').on('click','#btnEntregado', function(event){
        event.preventDefault()
        var href = $(this).attr('href')
        console.log(href)
        Swal.fire({
        title: 'El pedido se entrego con exito?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Entregado`,
        denyButtonText: `Estamos en eso`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method : 'GET',
                url : href,
                success : function(){
                    ordenes()
                },
                error: function(){
                    console.log('Error al procesar AJAX')
                }
            })
          Swal.fire('Pedido entregado!', '', 'success')
        } else if (result.isDenied) {

          Swal.fire('Puede seguir con el pedido actual', '', 'info')
        }
      })
    })
    
});