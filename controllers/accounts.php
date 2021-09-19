<?php
    class Accounts extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
        public function createCounts(){
            session_destroy();
            $page = 'accounts/create';
            $this->getView()->loadView($page);
        }
        public function createAddress(){
            if (isset($_SESSION['rol'])) {
                $this->getView()->departamentos = $this->getModel()->departamento();
                $page = 'accounts/AddressUser';
                $this->getView()->loadView($page); 
                
            }else{
                $page = 'accounts/create';
                $this->getView()->loadView($page);
            }
        }
        public function insertarUsuario(){
            // echo $_POST['txtName'];
            // echo $_POST['txtEmail'];
            // echo $_POST['txtPass'];
            $this->getModel()->setNameuser($_POST["txtName"]);
            $this->getModel()->setAddres($_POST['txtEmail']);
            $this->getModel()->setPasswords($_POST['txtPass']);
            
            $response = $this->getModel()->InsertUser();
            $Id = $this->getModel()->obtenerID();
            $rol = $this->getModel()->obtenerID();
            $this->getModel()->setId($Id);
            $nombre = $this->getModel()->Nombre();

            $_SESSION['nombre'] = $nombre;
            $_SESSION['rol']=$rol;
            $_SESSION['Id'] = $Id;
            header("Location:createAddress");
            echo $response;
        }
        public function Address(){
            
            $this->getModel()->setDepartamento($_POST['sDepa']);
            $this->getModel()->setMunicipio($_POST['txtMunicipio']);
            $this->getModel()->setCalle($_POST["txtCalle"]);
            $this->getModel()->setRef($_POST['txtRef']);
            $this->getModel()->setTel($_POST['txtTel']);
            $this->getModel()->setTel2($_POST['txtTel2']);

            $usuario = $_SESSION['Id'];
            $this->getModel()->setIdUser($usuario);

            $response = $this->getModel()->insertAddress();
            header("Location:".constant('URL')."inicio/login");
            echo $response;

        }
        
    }
?>