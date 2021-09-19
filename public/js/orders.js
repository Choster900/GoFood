$(document).ready(function () {
    console.log(url);

    ShowCart();
    function ShowCart(){
        $.ajax({
            type : 'POST',
            url : url+'orders/mostrarCarrito',
            success:function (response) {
                $("#table tbody").html(response);
                
            },
            error:function () {
                    
            }
        })
    }
    $('body').on('click','#completar', function(event){
        event.preventDefault()
        var href = $(this).attr('href')
        console.log(href)
        Swal.fire({
        title: 'Finalizaste las compras?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Si`,
        denyButtonText: `No`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method : 'GET',
                  url : href,
                  success : function(){
                  ShowCart()
                  if(url+'orders/finish' == 1){
                    alert('nice')
                  }else{
                    alert('Agrege datos al carrito')

                  }
                },
                error: function(){
                    console.log('Error al procesar AJAX')
                }
            })
          Swal.fire('La compra se ha hecho correctamente', '', 'success')
        } else if (result.isDenied) {

          Swal.fire('Puedes Seguir comprando :D', '', 'info')
        }
      })
    })
    $('body').on('click','#btnElimiarCarrito', function(event){
      event.preventDefault()
      var href = $(this).attr('href')
      console.log(href)
      Swal.fire({
      title: 'Desea Eliminar el producto de tu carrito?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: `Si`,
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              method : 'GET',
              url : href,
              success : function(){
                  ShowCart()
              },
              error: function(){
                  console.log('Error al procesar AJAX')
              }
          })
        Swal.fire('Producto Eliminado De Carrito de compras', '', 'success')
      } else if (result.isDenied) {

        Swal.fire('EL producto sigue en tu carrtio', '', 'info')
      }
    })
  })
    
});