<?php
    class Administrador extends Controller{
        public function __construct(){
            parent::__construct();
        }
        public function manage(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    $page = 'Administrador/manage';
                    $this -> getView()->loadView($page);
                }
                else if ($_SESSION['rol']==2) {
                    $page = 'Administrador/manage';
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
    }
?> 