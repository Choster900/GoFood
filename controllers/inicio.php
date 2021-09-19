<?php
    class Inicio extends Controller{
        public function __construct(){
            parent::__construct();
        }
        public function foremost(){//pagina de inicio
            if (!empty($_POST)) {
                $this->getModel()->setAddres($_POST['txtCorreo']);
                $this->getModel()->setPasswords($_POST['txtpass']);

                $rol = $this->getModel()->loginValidetta();
                $usuario = $this->getModel()->usuario();
                $id = $this->getModel()->id();


                if (!empty($rol)) {
                    $_SESSION['rol'] = $rol;
                    $_SESSION['nameUser'] = $usuario;
                    $_SESSION['Id'] = $id;

                    if ($_SESSION['rol']==2) {
                        $page = 'administrador/manage';
                        $this -> getView()->loadView($page); 
                    }else{
                        $page = 'Inicio/principal';
                        $this -> getView()->loadView($page); 
                    }
                    
                }else{
                    $page = 'Inicio/login';
                    $this -> getView()->loadView($page);
                }
            }else{
                if (isset($_SESSION['rol'])) {
                    $page = 'Inicio/principal';
                    $this -> getView()->loadView($page);
                }
                else{
                    $page = 'Inicio/login';
                    $this -> getView()->loadView($page);
                }
            }
                   
        }
        public function logOut(){
            session_destroy();
            $page = 'Inicio/login';
            $this -> getView()->loadView($page);
        }
        public function create(){//crear una cuenta
            
            $page = 'accounts/create';
            $this->getView()->loadView($page);
        }
        public function AddressUsers(){ //esto te voy a explicar despues
            $this->getView()->departaments = $this->getModel()->listDepartament();
            $page = 'accounts/AddressUser';
            $this->getView()->loadView($page);
        }
        public function login(){
            $page = 'inicio/login';
            $this->getView()->loadView($page);
        }
    }
?> 