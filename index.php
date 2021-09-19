<?php
    error_reporting(E_ALL);
   
    ini_set('ignore_repeated_errors',TRUE);
    
    ini_set('displat_errors',FALSE);
    
    ini_set('log_errores',TRUE);
    
    ini_set("error_log","C:/xampp\htdocs\GoFooD/php-error.log");//ruta donde quiero que se cree el archivo de errores
     

    require_once 'core/app.php';
    require_once 'core/database.php';
    require_once 'core/controller.php';
    require_once 'core/model.php';
    require_once 'core/view.php';


    require_once 'public/reportes/tcpdf.php';
    require_once 'public/chartphp/inc/chartphp_dist.php';
    require_once 'config/constants.php';
    $app = new App();
?>