$(document).ready(function () {
    console.log('ESTAMOS EN EMPLEADOS');
    console.log(url);

    empleados()
    function empleados(){
        $.ajax({
            type : 'POST',
            url : url+'empleado/mostrarEmpleados',
            success:function(response)
            {   
                $("#table tbody").html(response);
            },
            error:function()
            {
                alert('error');
            }

        })
    }
    $('body').on('click','#n', function(event){
        event.preventDefault()
        var href = $(this).attr('href')
        console.log(href)
        Swal.fire({
        title: 'Esta seguro de eliminar el empleado',
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
                    empleados()
                },
                error: function(){
                    console.log('Error al procesar AJAX')
                }
            })
          Swal.fire('Eliminado Correctamente', '', 'success')
        } else if (result.isDenied) {

          Swal.fire('Los datos permaneces', '', 'info')
        }
      })
    })
    var Add = $('#FrmProducto')
    Add.validetta({
        realTime: true,
        display : 'inline',
        errorTemplateClass : 'validetta-inline',
        onValid : function(event) {
            event.preventDefault();
            var method = Add.attr('method')
            var action = Add.attr('action')
            var data = Add.serialize()
            $.ajax({
                type : method,
                url : action,
                data : data,
                success:function () { 
                    Add[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'El empleado se ha guardado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      })
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
        }
    })
    //TODO:HACER QUE FUNCIONE EL AJAX PARA BORRAR
    
});