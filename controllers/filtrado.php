<?php
    class Filtrado extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
        public function Bebidas(){
            if (isset($_SESSION['rol'])) {
                $page = 'filtrado/bebidas';
                $this->getView()->loadView($page);
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function viwe_bebeidas(){
            if (isset($_SESSION['rol'])) {
                $bebida = $this->getModel()->view_bebidas();
                $_tr="";
                foreach ($bebida as $value) {
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
                    <td>';
                    if ($_SESSION['rol']!=2) {
                        $_tr .=' <a href="'.$cart.'" type="button" class="btn btn-primary btn-sm px-3" id="agregarCarrito">
                        <i class="fas fa-cart-plus fa-2x"></i>
                        </a>';
                    }
                    $_tr .='
                </tr>';
                }
            echo $_tr;
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function GranosBasicos(){
            if (isset($_SESSION['rol'])) {
                $page = 'filtrado/granos';
                $this->getView()->loadView($page);
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }

        public function view_granos(){
            if (isset($_SESSION['rol'])) {
                $Granos = $this->getModel()->granosBasicos();
            $_tr="";
            foreach ($Granos as $value) {
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
                <a href="'.$cart.'" type="button" class="btn btn-primary btn-sm px-3" id="agregarCarrito">
                <i class="fas fa-cart-plus fa-2x"></i>
                </a>
                </tr>';
                }
                echo $_tr;
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function FrutasVerduras(){
            if (isset($_SESSION['rol'])) {
                $page = 'filtrado/frutas';
                $this->getView()->loadView($page);
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function view_verduras(){
            if (isset($_SESSION['rol'])) {
                $frutas = $this->getModel()->verduras();
            $_tr="";
            foreach ($frutas as $value) {
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
                <td>';
                if ($_SESSION['rol']!=2) {
                    $_tr .=' <a href="'.$cart.'" type="button" class="btn btn-primary btn-sm px-3" id="agregarCarrito">
                    <i class="fas fa-cart-plus fa-2x"></i>
                    </a>';
                }
                $_tr .='
            </tr>';
            }
            echo $_tr;
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function Carnes(){
            if (isset($_SESSION['rol'])) {
                $page = 'filtrado/carnes';
                $this->getView()->loadView($page);
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function view_carnes(){
            if (isset($_SESSION['rol'])) {
                $carnes = $this->getModel()->carnes();
            $_tr="";
            foreach ($carnes as $value) {
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
                <td>';
                if ($_SESSION['rol']!=2) {
                    $_tr .=' <a href="'.$cart.'" type="button" class="btn btn-primary btn-sm px-3" id="agregarCarrito">
                    <i class="fas fa-cart-plus fa-2x"></i>
                    </a>';
                }
                $_tr .='
            </tr>';
            }
            echo $_tr;
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function Otros(){
            if (isset($_SESSION['rol'])) {
                $page = 'filtrado/otros';
                $this->getView()->loadView($page);
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
        public function view_otros(){
            if (isset($_SESSION['rol'])) {
                $otros = $this->getModel()->otros();
            $_tr="";
            foreach ($otros as $value) {
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
                <td>';
                if ($_SESSION['rol']!=2) {
                    $_tr .=' <a href="'.$cart.'" type="button" class="btn btn-primary btn-sm px-3" id="agregarCarrito">
                    <i class="fas fa-cart-plus fa-2x"></i>
                    </a>';
                }
                $_tr .='
            </tr>';
            }
            echo $_tr;
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            
        }
    }
    
?>