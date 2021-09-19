<?php
    class Grafico extends Controller{
        public function __construct()
        {
            parent::__construct();
        }
    
        public function Ventas(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3) {
                    $p = new chartphp();
                    $p->chart_type = "bar-stacked";
                    //pasar mi data 
                    $datos[] = $this->getModel()->grafico();
                    // echo '<pre>';
                    // print_r($datos).die();
                    $p->title = "";
                    $p->data= $datos;
                    $p->color = "blue";

                    $p->xlabel = "VENTAS";
                    $p->ylabel = "FECHAS";
        
                    $this->getView()->grafico = $p->render("c1");
        
                    $page = 'administrador/grafico';
                    $this->getView()->loadView($page);
                }else{
                    $page = 'inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page = 'inicio/login';
                $this->getView()->loadView($page);
            }
            //instancia de mi clas 
            
                
        
        }
    }
?>