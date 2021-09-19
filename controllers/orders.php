<?php
    class Orders extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
        public function cart(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']!=2) {
                    $pagina = 'pedidos/carrito';
                    $this->getView()->loadView($pagina);
                }else{
                    $pagina = 'administrador/manage';
                    $this->getView()->loadView($pagina);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
        }

        public function mostrarCarrito()
        {   
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']!=2) {
                    $id = $_SESSION['Id'];
                    $this->getModel()->setIdUser($id);
                    $cart = $this->getModel()->ShowCart();
                    $suma = $this->getModel()->sumaProduct();
                    $_tr="";
                    foreach ($cart as $value) {
                        $delete = constant('URL').'orders/DeleteCart?Id='.$value['Id'];
                        $_tr .= '<tr>
                        <th scope="row">
                            <img src="data:image/jpg;base64,'.base64_encode($value['photo']).'" alt="" class="img-fluid z-depth-0">
                        </th>
                        <td>
                            <h5 class="mt-3">
                                <strong>'.$value['nameProduct'].'</strong>
                            </h5>
                            <p class="text-muted">'.$value['nombreCateg'].'</p>
                        </td>   
                        <td>
                        '.$value['descriptions'].'
                        </td>

                        <td class="font-weight-bold">
                            <strong>'.$value['price'].'</strong>
                        </td>
                        <td>
                            <a href="'.$delete.'" class="btn btn-danger btn-sm px-3" id="btnElimiarCarrito">
                                Eliminar <i class="fas fa-trash"></i>
                            </a>  
                        </td>
                    </tr>';
                    }
                    $_tr .='<tr>
                        <td colspan="3">
                            <h4 class="mt-2">
                                <strong>TOTAL A PAGAR</strong>
                            </h4>
                        </td>
                        <td class="text-left">
                            <h4 class="mt-4">
                                <strong>$'.round($suma[0]['SUMA'],2) .'</strong>
                            </h4>
                        </td>
                        <td colspan="" class="text-left">
                            <a type="button" class="btn btn-primary btn-rounded" href="'.constant('URL').'orders/finish" id="completar">Completar Compra
                                <i class="fa fa-angle-right right"></i>
                            </a>
                        </td>
                    </tr>';
                    echo $_tr;
                }else{
                    $pagina = 'administrador/manage';
                    $this->getView()->loadView($pagina);
                }
                
                
                
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
        }
        public function insertar(){
            if (isset($_SESSION['rol'])) {
                if(isset($_GET['codigo'])){
                    $id = $_SESSION['Id'];
                    $producto = $_GET['codigo'];
                    $this->getModel()->setIdUser($id);
                    $this->getModel()->setIdProduct($producto);
    
                    $response = $this->getModel()->insertarCarrito();
                    echo $response;
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            //methodo para agregar al carrito
            
        }
        public function finish(){
            if (isset($_SESSION['rol'])) {
                $id = $_SESSION['Id'];
                $this->getModel()->setIdUser($id);
                $this->getModel()->setMetodoPago(2);

                $this->getModel()->AddOrder();
                $this->getModel()->detalleOrders();
                $this->getModel()->EliminarCarrito();
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            //TODO: VALIDAR QUE SI NO HAY PRODUCTO NO ENTRE AQUI 
             
            
        }
        public function factura(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==2) {
                    $orders = $this->getModel()->view_orders();
                $_tr="";
                
                foreach ($orders as $value) {
                    $entregado = constant('URL').'orders/entregados?Id='.$value['ID'];
                    $reporte = constant('URL').'REPORTS/OrdersDetail?Id='.$value['ID'];
    
                    $_tr .= '
                    <tr>
                        <td>
                            '.$value['ID'].'
                        </td>
                            <td >
                            '.$value['NAMEUSER'].'
                            </td>
                            <td >
                            '.$value['NAMEDEPARTAMENT'].'
                            </td>
                            <td class="font--bold">
                            '.$value['MUNICIPALITY'].'
                            </td>
                            <td class="font--bold">
                            '.$value['STREET'].'
                            </td>
                            <td class="font--bold">
                            '.$value['REFPLACE'].'
                            </td>
                            <td class="font--bold">
                            '.$value['TEL'].'
                            </td>
                            <td class="font--bold">
                            '.$value['TEL2'].'
                            </td>
                            <td class="font--bold">
                            '.$value['ESTADO'].'
                            </td>
                            <td class="font--bold">
                            '.$value['METODO'].'
                            </td>  
                            
                            <td>
                                <a href="'.$entregado.'" type="button" class="btn btn-primary btn-sm px-3" id="btnEntregado">
                                    <i class="fas fa-box-open"></i>
                                </a>       
                            </td>
                            <td>
                                <a href="'.$reporte.'" type="button" class="btn btn-primary btn-sm px-3" target="_blank">
                                    <i class="fas fa-file-contract"></i>
                                </a>        
                            </td>
                        </tr>';
                }
                echo $_tr;
                }else if($_SESSION['rol']==3){
                    $orders = $this->getModel()->view_orders();
                $_tr="";
                
                foreach ($orders as $value) {
                    $entregado = constant('URL').'orders/entregados?Id='.$value['ID'];
                    $reporte = constant('URL').'REPORTS/OrdersDetail?Id='.$value['ID'];
    
                    $_tr .= '
                    <tr>
                        <td>
                            '.$value['ID'].'
                        </td>
                            <td >
                            '.$value['NAMEUSER'].'
                            </td>
                            <td >
                            '.$value['NAMEDEPARTAMENT'].'
                            </td>
                            <td class="font--bold">
                            '.$value['MUNICIPALITY'].'
                            </td>
                            <td class="font--bold">
                            '.$value['STREET'].'
                            </td>
                            <td class="font--bold">
                            '.$value['REFPLACE'].'
                            </td>
                            <td class="font--bold">
                            '.$value['TEL'].'
                            </td>
                            <td class="font--bold">
                            '.$value['TEL2'].'
                            </td>
                            <td class="font--bold">
                            '.$value['ESTADO'].'
                            </td>
                            <td class="font--bold">
                            '.$value['METODO'].'
                            </td>  
                            
                            <td>
                                <a href="'.$entregado.'" type="button" class="btn btn-primary btn-sm px-3" id="btnEntregado">
                                    <i class="fas fa-box-open"></i>
                                </a>       
                            </td>
                            <td>
                                <a href="'.$reporte.'" type="button" class="btn btn-primary btn-sm px-3" target="_blank">
                                    <i class="fas fa-file-contract"></i>
                                </a>        
                            </td>
                        </tr>';
                }
                echo $_tr;
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page); 
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
            
        }
        public function pedidos(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==2) {
                    $page = 'pedidos/pedidos';
                    $this->getView()->loadView($page);
                }else if($_SESSION['rol']==3){
                    $page = 'pedidos/pedidos';
                    $this->getView()->loadView($page);
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page); 
            }
        }
        public function entregados(){
            if (isset($_SESSION['rol'])) {
                if(!empty($_GET['Id'])){
                    $id = $_GET['Id'];
                    $this->getModel()->setIdorden($id);
                    $reponse = $this->getModel()->entregado();
                    echo $reponse;
                }else{
                    echo 'ERROR 404';
                }
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page); 
            }
            
        }
        //TODO:VALIDAR CON SESSIONES 
        public function compras(){
            if (isset($_SESSION['rol'])) {
                $page = 'pedidos/compras';
                $this->getView()->loadView($page);
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page); 
            }
            
        }
        public function MostrarCompras(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']!=2) {
                    $id = $_SESSION['Id'];
                    $this->getModel()->setIdUser($id);
                    $compra = $this->getModel()->ComprasCliente();
                    $_tr ='';
                    foreach ($compra as $value) {
                        $eliminadoLogico = constant('URL').'orders/eliminar?Id='.$value['ID'];
                        $reporte = constant('URL').'REPORTS/OrdersDetail?Id='.$value['ID'];
                        $_tr .= '
                        <tr>
                            
                                <td >
                                '.$value['NAMEUSER'].'
                                </td>
                                <td >
                                '.$value['NAMEDEPARTAMENT'].'
                                </td>
                                <td class="font--bold">
                                '.$value['MUNICIPALITY'].'
                                </td>
                                <td class="font--bold">
                                '.$value['STREET'].'
                                </td>
                                <td class="font--bold">
                                '.$value['REFPLACE'].'
                                </td>
                                <td class="font--bold">
                                '.$value['TEL'].'
                                </td>
                                <td class="font--bold">
                                '.$value['TEL2'].'
                                </td>
                                <td class="font--bold">
                                '.$value['ESTADO'].'
                                </td>
                                <td class="font--bold">
                                '.$value['METODO'].'
                                </td>  
                                <td>
                                    <a href="'.$reporte.'" type="button" class="btn btn-info btn-sm px-3" id="btnReporte" target="_blank" >
                                        Ver pedido<i class="fas fa-book-open"></i>
                                    </a>       
                                </td>
                                <td>
                                    <a href="'.$eliminadoLogico.'" type="button" class="btn btn-danger btn-sm px-3" id="btnEliminar">
                                        Eliminar<i class="fas fa-asterisk"></i>
                                    </a>       
                                </td>
                                
                            </tr>';
                    }
                    echo $_tr;
                }else{
                    $pagina = 'administrador/manage';
                    $this->getView()->loadView($pagina);
                }
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page); 
            }
            
        }
        public function eliminar(){
            if (isset($_SESSION['rol'])) {
                if(!empty($_GET['Id'])){
                    $id = $_GET['Id'];
                    $this->getModel()->setIdorden($id);
                    $reponse = $this->getModel()->EliminadoLogico();
                    echo $reponse;
                }
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page); 
            }
            
        }
        public function DeleteCart(){
            if (isset($_SESSION['rol'])) {
                if(!empty($_GET['Id'])){
                    $id = $_GET['Id'];
                    $this->getModel()->setIdCart($id);
                    $reponse = $this->getModel()->EliminarCart();
                    echo $reponse;
                }
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page); 
            }
            
        }

    }
?>
