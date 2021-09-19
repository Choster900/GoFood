<?php
    class Reports extends Controller{
        public function __construct()
        {
            parent::__construct();           
        }
        public function OrdersDetail(){
            
                if(isset($_GET['Id'])){
                    $pdf = new TCPDF();
                    $id = $_GET['Id'];
                    //encabezado 
                    $pdf->setHeaderMargin(10);  //margen
                    $pdf->setHeaderData(PDF_HEADER_LOGO,40,"LISTADO DE TODOS LOS PAISES","PAISES");  //loho y titulo
                
                    //contenido del reporte
                    $pdf -> SetMargins(20,30,20);
                    $this->getModel()->setIdorden($id);
                    $datos = $this->getModel()->detalles();
    
                    // print_r($datos[0]['IDORDER']).die();
                    $_table = ' <p>ORDEN N°: 00'.$datos[0]['IDORDER'].'</p>
                    <table border="1" cellpadding="5">
                        <tr>
                            <th>PRODUCTO</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO</th>
                        </tr>';
                    foreach ($datos as $value) {
                        $_table .= '
                        <tr>
                            <td>'.$value['NAMEPRODUCT'].'</td>
                            <td>'.$value['DESCRIPTIONS'].'</td>
                            <td>'.$value['PRICE'].'</td>
                        </tr>';
                    }
                    $_table .= '
                    </table>
                    <h4>
                            <strong>sub-tot: '.round($datos[0]['SUTOTAL'],2) .'</strong>
                        </h4>
                        <h4>
                            <strong>total: '.round($datos[0]['TOTAL'],2) .'</strong>
                        </h4>';
    
                    $pdf -> AddPage();
                    $pdf -> writeHTML($_table);
                    ob_end_clean();
                    $pdf -> Output('Factura: 00'.$datos[0]['IDORDER']);
                }else{
                    $page ='inicio/login';
                    $this->getView()->loadView($page);
                }
            
            
            
        }
        public function fecha(){
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol']==3 ) {
                    if(!empty($_POST['fecha'])){
                        $this->getModel()->setFecha($_POST['fecha']);
                        
                        $pdf = new TCPDF();
        
                        //encabezado 
                        $pdf->setHeaderMargin(10);  //margen
                        $pdf->setHeaderData(PDF_HEADER_LOGO,40,"LISTADO POR FECHAS","PEDIDOS");  //loho y titulo
                        
        
                        //contenido del reporte
                        $pdf -> SetMargins(20,30,20);
                        $datos = $this->getModel()->fecha();
                        if (!empty($datos)) {
                            $_table = '
                            <table cellspacing="5" cellpadding="5" border="1">
                            <thead>
                                <tr>
                                    <td colspan="5" align="center" bgcolor="666666"><font color="#FFFFFF"><strong>Pedidos hecho en fecha: '.$datos[0]['FECHA'].'</strong></font></td>
                                </tr>
                                <tr bgcolor="#358391">
                                    <th>ID ORDEN</th>
                                    <th>USUARIO</th>
                                    <th>CONDITIONS</th>
                                    <th>SUBTOTAL</th>
                                    <th >TOTAL</th>
                                </tr>
                            </thead>';
                            foreach ($datos as  $value) {
                                $_table .= '
                                <tbody>
                                    <tr >
                                        <td>'.$value['ID'].'</td>
                                        <td>'.$value['NAMEUSER'].'</td>
                                        <td>'.$value['ESTADO'].'</td>
                                        <td>'.round($value['SUTOTAL'],2).'</td>
                                        <td>'.round($value['TOTAL'],2). '</td>
                                    </tr>
                                </tbody>';
                            }
                            $_table .= '</table>';
                        }else{
                            $_table = '<h2>FECHA NO ECONTRADA</h2>';
                        }
                        
                        
                        $pdf -> AddPage();
                        $pdf -> writeHTML($_table);
                        ob_end_clean();
                        $pdf -> Output('Reporte de fechas');
        
        
                    }else if(!empty($_POST['estado'])){
                        $this->getModel()->setEstado($_POST['estado']);
        
                        $pdf = new TCPDF();
                        //encabezado 
                        $pdf->setHeaderMargin(10);  //margen
                        $pdf->setHeaderData(PDF_HEADER_LOGO,40,"LISTADO POR ESTADO","PEDIDOS");  //loho y titulo
                        
        
                        //contenido del reporte
                        $pdf -> SetMargins(20,30,20);
                        
                        $datos = $this->getModel()->estado();
                        if (!empty($datos)) {
                            $_table = '<table cellspacing="5" cellpadding="5" border="1">
                            <tr bgcolor="#358391">
                                <td>ID ORDEN</td>
                                <td>USUARIO</td>
                                <td>CONDITIONS</td>
                                <td>SUBTOTAL</td>
                                <td>TOTAL</td>
                            </tr>';
                            foreach ($datos as  $value) {
                                $_table .= '<tr>
                                    <td>'.$value['ID'].'</td>
                                    <td>'.$value['NAMEUSER'].'</td>
                                    <td>'.$value['ESTADO'].'</td>
                                    <td>'.round($value['SUTOTAL'],2).'</td>
                                    <td>'.round($value['TOTAL'],2).'</td>
                                </tr>';
                            }
                            $_table .= '</table>';
                        }else{
                            $_table = '<h2>NO HAY PEDIDOS CON ESTE ESTADO :D</h2>';
                        }
                        
                        
                        $pdf -> AddPage();
                        $pdf -> writeHTML($_table);
                        ob_end_clean();
                        $pdf -> Output('Reporte de estado');
                    }else{
                        $page = 'administrador/fecha';
                        $this->getView()->loadView($page);
                    }
                }else if($_SESSION['rol']==2){
                    if(!empty($_POST['fecha'])){
                        $this->getModel()->setFecha($_POST['fecha']);
                        
                        $pdf = new TCPDF();
        
                        //encabezado 
                        $pdf->setHeaderMargin(10);  //margen
                        $pdf->setHeaderData(PDF_HEADER_LOGO,40,"LISTADO POR FECHAS","PEDIDOS");  //loho y titulo
                        
        
                        //contenido del reporte
                        $pdf -> SetMargins(20,30,20);
                        $datos = $this->getModel()->fecha();
                        
                        $_table = '<p>FEHCA: '.$datos[0]['FECHA'].'</p>
                        <table>
                        <tr>
                            <td>ID ORDEN</td>
                            <td>USUARIO</td>
                            <td>CONDITIONS</td>
                            <td>SUBTOTAL</td>
                            <td>TOTAL</td>
                        </tr>';
                        foreach ($datos as  $value) {
                            $_table .= '<tr>
                                <td>'.$value['ID'].'</td>
                                <td>'.$value['NAMEUSER'].'</td>
                                <td>'.$value['ESTADO'].'</td>
                                <td>'.round($value['SUTOTAL'],2).'</td>
                                <td>'.round($value['TOTAL'],2).'</td>
                            </tr>';
                        }
                        $_table .= '</table>';
                        
                        $pdf -> AddPage();
                        $pdf -> writeHTML($_table);
                        ob_end_clean();
                        $pdf -> Output('Reporte de GoDFood');
        
        
                    }else if(!empty($_POST['estado'])){
                        $this->getModel()->setEstado($_POST['estado']);
        
                        $pdf = new TCPDF();
                        //encabezado 
                        $pdf->setHeaderMargin(10);  //margen
                        $pdf->setHeaderData(PDF_HEADER_LOGO,40,"LISTADO POR ESTADO","PEDIDOS");  //loho y titulo
                        
        
                        //contenido del reporte
                        $pdf -> SetMargins(20,30,20);
                        
                        $datos = $this->getModel()->estado();
                        
                        $_table = '<table>
                        <tr>
                            <td>ID ORDEN</td>
                            <td>USUARIO</td>
                            <td>CONDITIONS</td>
                            <td>SUBTOTAL</td>
                            <td>TOTAL</td>
                        </tr>';
                        foreach ($datos as  $value) {
                            $_table .= '<tr>
                                <td>'.$value['ID'].'</td>
                                <td>'.$value['NAMEUSER'].'</td>
                                <td>'.$value['ESTADO'].'</td>
                                <td>'.round($value['SUTOTAL'],2).'</td>
                                <td>'.round($value['TOTAL'],2).'</td>
                            </tr>';
                        }
                        $_table .= '</table>';
                        
                        $pdf -> AddPage();
                        $pdf -> writeHTML($_table);
                        ob_end_clean();
                        $pdf -> Output('Reporte de GoDFood');
                    }else{
                        $page = 'administrador/fecha';
                        $this->getView()->loadView($page);
                    }
                }else{
                    $page ='inicio/principal';
                    $this->getView()->loadView($page);
                }
            }else{
                $page ='inicio/login';
                $this->getView()->loadView($page);
            }
            
            
            
        }
    }
?>

