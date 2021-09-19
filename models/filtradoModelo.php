<?php
    class FiltradoModelo extends Model{
        public function __construct()
        {
            parent :: __construct();
        }
        public function view_bebidas(){
            $bebida = [];
            $sql = "select * from view_bebidas;";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $bebida[] = $row;
            }
            return $bebida;
        }
        public function granosBasicos(){
            $granos = [];
            $sql = "select * from view_granos;";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $granos[] = $row;
            }
            return $granos;
        }
        public function verduras(){
            $frutas = [];
            $sql = "select * from view_frutas;";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $frutas[] = $row;
            }
            return $frutas;
        }
        public function carnes(){
            $carne = [];
            $sql = "select * from view_carne;";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $carne[] = $row;
            }
            return $carne;
        }
        public function otros(){
            $otro = [];
            $sql = "select * from view_otros;";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $otro[] = $row;
            }
            return $otro;
        }
    }
?>