<?php
    class Producto extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
        public function index(){
            if (isset($_SESSION['rol'])) {
                if($_SESSION['rol']==3){
                    $page = 'Producto/index';
                    $this -> getView()->loadView($page);
                }
                else if($_SESSION['rol']==2){
                    $page = 'Producto/index';
                    $this -> getView()->loadView($page);
                }else{
                    $page = 'inicio/principal';
                    $this -> getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
            
        }
        public function higiene(){
            if (isset($_SESSION['rol'])) {
                $page = 'Producto/filtradoHigiene';
                $this -> getView()->loadView($page);
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
        }
        public function Agregar(){
            if (isset($_SESSION['rol'])) {
                if($_SESSION['rol']==3){
                    $this->getView()->categoria = $this->getModel()->listcategory();;
                    $page = 'Producto/agregar';
                    $this -> getView()->loadView($page);
                }
                else if($_SESSION['rol']==2){
                    $this->getView()->categoria = $this->getModel()->listcategory();;
                    $page = 'Producto/agregar';
                    $this -> getView()->loadView($page);
                }else{
                    $page = 'inicio/principal';
                    $this -> getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
           
            
            
        }
        public function agregarProducto(){
            if (isset($_SESSION['rol'])) {
                if($_SESSION['rol']==3){
                    $this->getModel()->setName($_POST["txtNombreProducto"]);
                    $this->getModel()->setPrice($_POST['txtPrecio']);
                    $this->getModel()->setStok($_POST['txtStok']);
                    $this->getModel()->setDescription($_POST['txtDescripcion']);
                    $this->getModel()->setCateg($_POST['sCateg']);
                    $this->getModel()->setConditions($_POST['sEstado']);
                    
                    $imagen = addslashes(file_get_contents($_FILES['fileImage']['tmp_name']));
                    $this->getModel()->setImage($imagen);
        
                    $response = $this->getModel()->AddProducts();
                    echo $response;
                }else if($_SESSION['rol']==2){
                    $this->getModel()->setName($_POST["txtNombreProducto"]);
                    $this->getModel()->setPrice($_POST['txtPrecio']);
                    $this->getModel()->setStok($_POST['txtStok']);
                    $this->getModel()->setDescription($_POST['txtDescripcion']);
                    $this->getModel()->setCateg($_POST['sCateg']);
                    $this->getModel()->setConditions($_POST['sEstado']);
                    
                    $imagen = addslashes(file_get_contents($_FILES['fileImage']['tmp_name']));
                    $this->getModel()->setImage($imagen);
        
                    $response = $this->getModel()->AddProducts();
                    echo $response;
                }else{
                    $page = 'inicio/principal';
                    $this -> getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            

            
        }
        public function ShowProduct(){//esto es para el administrador
            if (isset($_SESSION['rol'])) {
                $product = $this->getModel()->viewProduct();
            $_tr="";
            foreach ($product as $value) {
                $update = constant('URL').'producto/update?codigo='.$value['id'];
                $drop = constant('URL').'producto/drop?codigo='.$value['id'];

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
                
                <td>'.$value['stok'].'</td>
                
                <td class="font-weight-bold">
                    <strong>'.$value['price'].'</strong>
                </td>
                <td class="font-weight-bold">
                    <strong>'.$value['CONDICION'].'</strong>
                </td>
                <td>';
                if($_SESSION['rol']==3)
                {
                    $_tr .= '<a href="'.$update.'" type="button" class="btn btn-info btn-sm px-4">
                    Editar <i class="fas fa-pen"></i>
                </a>';
                }
                $_tr .='
                 
                </td>
            </tr>';
            }
            echo $_tr;
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
        }
        public function update(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    if (isset($_GET['codigo'])) {
                        $id=$_GET['codigo'];
                        $this->getModel()->setId($id);
                        error_log('CONTROLLER::modificar -> Codigo del producto: '.$id);     
        
                        $this->getView()->producto=$this->getModel()->filtrar();
                        $this->getView()->categoria = $this->getModel()->listcategory();//para listar las marcas en select
                        $page = 'Producto/update';
                        $this->getView()->loadView($page);//metodo para mostrar pagina siempre mas de lo mismo
                    }
                    else{
                        if (!empty($_POST)) {
                            $this->getModel()->setId($_POST['txtID']);
                            $this->getModel()->setName($_POST["txtNombreProducto"]);
                            $this->getModel()->setPrice($_POST['txtPrecio']);
                            $this->getModel()->setStok($_POST['txtStok']);
                            $this->getModel()->setDescription($_POST['txtDescripcion']);
                            $this->getModel()->setCateg($_POST['sCateg']);
                            $this->getModel()->setConditions($_POST['sEstado']);
    
                            $imagen = addslashes(file_get_contents($_FILES['fileImage']['tmp_name']));
                            $this->getModel()->setImage($imagen);
    
                            $response = $this->getModel()->UpdateProduct();
                            echo $response;
                            error_log('CONTROLLER::Producto->update "Producto actualizado"');
                        }
                    }
                }else{
                    $page = 'inicio/principal';
                    $this -> getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
                
        }
        public function drop(){
            if (isset($_SESSION['rol'])) {
                if (isset($_GET['codigo'])) {
                    $id = $_GET['codigo'];  
                    $this->getModel()->setId($id);
                    $response = $this->getModel()->deleteProduct();
                    echo $response; 
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
        }
        public function filtradoHigiene(){//filtrado al cliente
            if (isset($_SESSION['rol'])) {
                $higiene = $this->getModel()->filtrado1();
                $_tr="";
                foreach ($higiene as $value) {
                    $cart = constant('URL').'orders/insertar?codigo='.$value['id'];
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
                    
                    <td>'.$value['stok'].'</td>
                    
                    <td class="font-weight-bold">
                            <strong>'.$value['price'].'</strong>
                    </td>
                    <td>
                    <a href="'.$cart.'" type="button" class="btn btn-primary btn-sm px-3" id="btnAgregar">
                    <i class="fas fa-cart-plus fa-2x"></i>
                    </a>
                </tr>';
                }
                echo $_tr;
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
        }
        
    }
?>