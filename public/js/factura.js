$(document).ready(function () {
    factura()
    function factura(){
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
});