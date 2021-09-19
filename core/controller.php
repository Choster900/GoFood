<?php
    class Controller {
        private $view;
        private $model;

        public function __construct(){
            session_start();
            $this->view = new Views();
            
        }

        public function loadModel($model){
            $urlModel = 'models/'.$model.'Modelo.php';
            if(file_exists($urlModel)){
                require_once $urlModel;
                $nombreModelo = $model.'Modelo';
                $this->model = new $nombreModelo();
            }
        }

        public function getView(){
            return $this->view;
        }
        public function setView($view){
            $this->view = $view;
        }
        public function getModel(){
            return $this->model;
        }
        public function setModel($model){
            $this->model = $model;
        }
    }
?>