<?php
    class ReportsModelo extends Model{
        public function __construct()
        {
            parent::__construct();
        }  
        
        private $idorden;
        private $fecha;
        private $estado;

        public function detalles(){
            $detalle = [];
            $sql = "CALL SP_FACTURA_DETALLE (".$this->idorden.")";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $detalle[] = $row;
            }
            return $detalle;
        }
        public function fecha(){
            $detalle = [];
            $sql = "CALL SP_FILTRADO_FECHA ('".$this->fecha."')";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $detalle[] = $row;
            }
            return $detalle;
        }
        public function estado(){
            $detalle = [];
            $sql = "CALL SP_FILTRADO_ESTADO(".$this->estado.")";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $detalle[] = $row;
            }
            return $detalle;
        }

        /**
         * Get the value of idorden
         */
        public function getIdorden()
        {
                return $this->idorden;
        }

        /**
         * Set the value of idorden
         *
         * @return  self
         */
        public function setIdorden($idorden)
        {
                $this->idorden = $idorden;

                return $this;
        }

        /**
         * Get the value of fecha
         */
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }
    }
?>