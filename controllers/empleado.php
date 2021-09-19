<?php
    class Empleado extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
        public function administracion(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    $page = 'empleado/empleados';
                    $this->getView()->loadView($page);
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
            
        }
        public function mostrarEmpleados(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    $empleados = $this->getModel()->mostrar();
                    $tr = '';
                    foreach ($empleados as $value) {
                        $update = constant('URL').'empleado/update?codigo='.$value['ID'];
                        $delete = constant('URL').'empleado/delete?codigo='.$value['ID'];
                        $tr .= '<tr>
                        <td>'.$value['ID'].'</td>
                        <td>'.$value['NAMEUSER'].'</td>
                        <td>'.$value['ADDRES'].'</td>
                        <td>'.$value['ROL'].'</td>
                        <td>
                            <a href="'.$update.'" class="btn btn-primary btn-sm px-3">
                                Edit <i class="fas fa-pen"></i>
                            </a>
                            <a href="'.$delete.'" class="btn btn-danger btn-sm px-3" id="n">
                                Delete <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>';
                    }
                    echo $tr;
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
            
        }
        public function Add(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    $page = 'empleado/nuevo';
                    $this->getView()->loadView($page);
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
           
        }
        public function agregar(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    if(!empty($_POST)){
                        $this->getModel()->setNombre($_POST['nombre']);
                        $this->getModel()->setCorreo($_POST['correo']);
                        $this->getModel()->setContra($_POST['pass']);
                        $this->getModel()->setRol(2);
        
                        $response = $this->getModel()->agregarEmpleado();
                        echo $response;
        
                    }
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
            
        }
        public function Update(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    if (isset($_GET['codigo'])) {
                        $id=$_GET['codigo'];
                        $this->getModel()->setId($id);
                        error_log('CONTROLLER::modificar -> Codigo del producto: '.$id);     
        
                        $this->getView()->empleado=$this->getModel()->filUpdate();
        
                        $page = 'empleado/editar';
                        $this->getView()->loadView($page);//metodo para mostrar pagina siempre mas de lo mismo
                    }
                    else{
                        if (!empty($_POST)) {
                            $this->getModel()->setId($_POST['id']);
                            $this->getModel()->setNombre($_POST["nombre"]);
                            $this->getModel()->setCorreo($_POST['correo']);
                            $this->getModel()->setContra($_POST['pass']);
          
                            $response = $this->getModel()->actualizar();
                            echo $response;
        
                        }
                    }
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
            
            
        }
        public function delete(){
            if (isset($_SESSION['rol'])) {
                if (isset($_GET['codigo'])) {
                    $id = $_GET['codigo'];  
                    $this->getModel()->setId($id);
                    $response = $this->getModel()->borrar();
                    echo $response; 
                }
            }else{
                $page = 'inicio/login';
                $this -> getView()->loadView($page);
            }
            
        }
    }
?>