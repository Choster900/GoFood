<?php
    class EmpleadoModelo extends Model{
        public function __construct()
        {
            parent::__construct();
        }
        private $id;
        private $nombre;
        private $correo;
        private $contra;
        private $rol;

        public function mostrar(){
            $empleados = [];
            $sql = "SELECT ID,NAMEUSER,ADDRES,IF(ROL=2,'EMPLEADO','USUARIO') AS ROL FROM USERS WHERE ROL = 2 OR ROL = 1";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $empleados[] = $row;
            }
            return $empleados;
        }
        public function agregarEmpleado(){
            $insert = "CALL InsertUSers ('".$this->nombre."','".$this->correo."','".$this->contra."',".$this->rol.")";
            $sql = $this->getDb()->conectar()->query($insert);
            return ($sql==TRUE)?true:false;
        }
        public function filUpdate(){
                $empleados = [];
                $sql = "SELECT * FROM USERS  WHERE ID = (".$this->id.")";
                $view = $this->getDb()->conectar()->query($sql);
                while($row = $view -> fetch_assoc()){
                    $empleados[] = $row;
                }
                return $empleados;
        }
        public function actualizar(){
                $insert = "UPDATE USERS SET NAMEUSER = ('".$this->nombre."'),
                                        ADDRES = ('".$this->correo."'),
                                        PASSWORDS = ('".$this->contra."') WHERE ID = (".$this->id.")";
                $sql = $this->getDb()->conectar()->query($insert);
                return ($sql==TRUE)?true:false;
        }
        public function borrar(){
                $insert = "DELETE FROM USERS WHERE ID = (".$this->id.")";
                $sql = $this->getDb()->conectar()->query($insert);
                return ($sql==TRUE)?true:false;   
        }
        

        /**
         * Get the value of nombre
         */
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of correo
         */
        public function getCorreo()
        {
                return $this->correo;
        }

        /**
         * Set the value of correo
         *
         * @return  self
         */
        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        /**
         * Get the value of contra
         */
        public function getContra()
        {
                return $this->contra;
        }

        /**
         * Set the value of contra
         *
         * @return  self
         */
        public function setContra($contra)
        {
                $this->contra = $contra;

                return $this;
        }

        /**
         * Get the value of rol
         */
        public function getRol()
        {
                return $this->rol;
        }

        /**
         * Set the value of rol
         *
         * @return  self
         */
        public function setRol($rol)
        {
                $this->rol = $rol;

                return $this;
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }
?>