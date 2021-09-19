<?php
    class  InicioModelo extends Model{
        private $Id;
        private $NameUSer;
        private $Addres;
        private $Passwords;
        private $rol;

        

        /**
         * Get the value of Id
         */
        public function getId()
        {
                return $this->Id;
        }

        /**
         * Set the value of Id
         *
         * @return  self
         */
        public function setId($Id)
        {
                $this->Id = $Id;

                return $this;
        }

        /**
         * Get the value of NameUSer
         */
        public function getNameUSer()
        {
                return $this->NameUSer;
        }

        /**
         * Set the value of NameUSer
         *
         * @return  self
         */
        public function setNameUSer($NameUSer)
        {
                $this->NameUSer = $NameUSer;

                return $this;
        }

        /**
         * Get the value of Addres
         */
        public function getAddres()
        {
                return $this->Addres;
        }

        /**
         * Set the value of Addres
         *
         * @return  self
         */
        public function setAddres($Addres)
        {
                $this->Addres = $Addres;

                return $this;
        }

        /**
         * Get the value of Passwords
         */
        public function getPasswords()
        {
                return $this->Passwords;
        }

        /**
         * Set the value of Passwords
         *
         * @return  self
         */
        public function setPasswords($Passwords)
        {
                $this->Passwords = $Passwords;

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
        public function loginValidetta(){
            $nivel = "";
            $sql = "SELECT ROL FROM USERS WHERE ADDRES = '".$this->Addres."' AND PASSWORDS ='".$this->Passwords."'";
            $datos = $this->getDb()->conectar()->query($sql); 
            while($fila = $datos -> fetch_assoc())
            {
               $nivel =  $fila['ROL'];
            }
            return $nivel;
         }
         public function usuario(){
            $nivel = "";
            $sql = "SELECT NAMEUSER FROM USERS WHERE ADDRES = '".$this->Addres."' AND PASSWORDS ='".$this->Passwords."'";
            $datos = $this->getDb()->conectar()->query($sql); 
            while($fila = $datos -> fetch_assoc())
            {
               $nivel =  $fila['NAMEUSER'];
            }
            return $nivel;
         }
         public function Id(){
            $nivel = "";
            $sql = "SELECT Id FROM USERS WHERE ADDRES = '".$this->Addres."' AND PASSWORDS ='".$this->Passwords."'";
            $datos = $this->getDb()->conectar()->query($sql); 
            while($fila = $datos -> fetch_assoc())
            {
               $nivel =  $fila['Id'];
            }
            return $nivel;
         }
         public function obtenerDireccion($identificacion){
                $nivel = "";
                $sql = "SELECT ID FROM address WHERE IDUSER = (".$identificacion.")";
                $datos = $this->getDb()->conectar()->query($sql); 
                while($fila = $datos -> fetch_assoc())
                {
                   $nivel =  $fila['ID'];
                }
                return $nivel;
        }
         

    }
?>