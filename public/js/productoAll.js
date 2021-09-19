$(document).ready(function () {
    console.log(url)
    ShowProdut()

    function ShowProdut(){
        $.ajax({
            type : 'POST',
            url : url+'producto/ShowProduct',
            success:function (response) {
                $("#table tbody").html(response);
                
            },
            error:function () {
                    
            }
        })
    }

    var Add = $('#FrmProducto')
    Add.validetta({
        realTime: true,
        display : 'inline',
        errorTemplateClass : 'validetta-inline',
        onValid : function(event) {
            event.preventDefault();
            var method = Add.attr('method')
            var action = Add.attr('action')
            var data = new FormData(Add[0]) 
            $.ajax({
                method : method,
                url : action,
                data : data,
                contentType : false,
                processData : false,
                success:function () { 
                    Add[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Producto Agregago',
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
    //TODO: AJAX PARA ACUALIZAR

    var update = $('#frmUpdate')
    update.validetta({
        realTime: true,
        display : 'inline',
        errorTemplateClass : 'validetta-inline',
        
        onValid : function(event) {
            event.preventDefault();
            var method = update.attr('method')
            var action = update.attr('action')
            var data = new FormData(update[0]) 
            $.ajax({
                method : method,
                url : action,
                data : data,
                contentType : false,
                processData : false,
                success:function () { 
                    update[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Los cambios se han hecho satisfactoriamente',
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

    
});