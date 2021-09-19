$(document).ready(function () {
    console.log('estamos en frutas y verduras');
    showFrutas();
    function showFrutas(){
        $.ajax({
            type : 'POST',
            url : url+'filtrado/view_verduras',
            success:function (response) {
                $("#table tbody").html(response);
                
            },
            error:function () {
                    
            }
        })
    }
    $('body').on('click','#agregarCarrito', function(event){
        event.preventDefault()
        var href = $(this).attr('href')
        console.log(href)
        $.ajax({
          type : 'GET',
          url : href,
          success:function () { 
              Swal.fire({
                  icon: 'success',
                  title: 'Agregado al carrito',
                  showConfirmButton: false,
                  timer: 1500
                })
                showFrutas();
          },
          error:function(){
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                  footer: '<a href>Why do I have this issue?</a>'
                })
          }
      })
    })
});