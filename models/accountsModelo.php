<?php
    class AccountsModelo extends Model{
        private $id;
        private $nameuser;
        private $addres;
        private $passwords;
        private $rol;

        private $idDireccion;
        private $idUser;
        private $departamento;
        private $municipio;
        private $calle;
        private $ref;
        private $tel;
        private $tel2;

        public function __construct()
        {
            parent::__construct();
        }
        public function InsertUser(){
            $insert = "CALL SP_USERS ('".$this->nameuser."','".$this->addres."','".$this->passwords."')";
            $sql = $this->getDb()->conectar()->query($insert);
            return ($sql==TRUE)?true:false;
        }
        public function obtenerID()
        {
                $id = "";
                $sql = "CALL sp_SelecIdUsers ('".$this->nameuser."','".$this->passwords."')";
                $datos = $this->getDb()->conectar()->query($sql);
                while($fila = $datos -> fetch_assoc())
                {
                 $id =  $fila['Id'];
                }
                return $id;
        }
        public function Nombre()
        {
                $id = "";
                $sql = "SELECT NAMEUSER FROM USERS WHERE ID  = (".$this->id.")";
                $datos = $this->getDb()->conectar()->query($sql);
                while($fila = $datos -> fetch_assoc())
                {
                 $id =  $fila['NAMEUSER'];
                }
                return $id;
        }
        
        public function insertAddress(){
                $insert = "INSERT INTO ADDRESS (IDUSERS,DEPARTAMENT,MUNICIPALITY,STREET,REFPLACE,TEL,TEL2) 
                VALUES (".$this->idUser.",
                        ".$this->departamento.",
                        '".$this->municipio."',
                        '".$this->calle."',
                        '".$this->ref."',
                        '".$this->tel."',
                        '".$this->tel2."')";
                $sql = $this->getDb()->conectar()->query($insert);
                return ($sql==TRUE)?true:false;
        }
        public function departamento()
        {
            $arreglo = [];
            $consulta = "SELECT  * FROM departament";
            $select = $this->getDb() -> conectar() -> query($consulta) ;
            while($fila = $select -> fetch_object())
            {
                $arreglo[] =  json_decode(json_encode($fila),true);
            }
            return $arreglo;
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

        /**
         * Get the value of nameuser
         */
        public function getNameuser()
        {
                return $this->nameuser;
        }

        /**
         * Set the value of nameuser
         *
         * @return  self
         */
        public function setNameuser($nameuser)
        {
                $this->nameuser = $nameuser;

                return $this;
        }

        /**
         * Get the value of addres
         */
        public function getAddres()
        {
                return $this->addres;
        }

        /**
         * Set the value of addres
         *
         * @return  self
         */
        public function setAddres($addres)
        {
                $this->addres = $addres;

                return $this;
        }

        /**
         * Get the value of passwords
         */
        public function getPasswords()
        {
                return $this->passwords;
        }

        /**
         * Set the value of passwords
         *
         * @return  self
         */
        public function setPasswords($passwords)
        {
                $this->passwords = $passwords;

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
         * Get the value of idDireccion
         */
        public function getIdDireccion()
        {
                return $this->idDireccion;
        }

        /**
         * Set the value of idDireccion
         *
         * @return  self
         */
        public function setIdDireccion($idDireccion)
        {
                $this->idDireccion = $idDireccion;

                return $this;
        }

        /**
         * Get the value of idUser
         */
        public function getIdUser()
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @return  self
         */
        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }

        /**
         * Get the value of departamento
         */
        public function getDepartamento()
        {
                return $this->departamento;
        }

        /**
         * Set the value of departamento
         *
         * @return  self
         */
        public function setDepartamento($departamento)
        {
                $this->departamento = $departamento;

                return $this;
        }

        /**
         * Get the value of municipio
         */
        public function getMunicipio()
        {
                return $this->municipio;
        }

        /**
         * Set the value of municipio
         *
         * @return  self
         */
        public function setMunicipio($municipio)
        {
                $this->municipio = $municipio;

                return $this;
        }

        /**
         * Get the value of calle
         */
        public function getCalle()
        {
                return $this->calle;
        }

        /**
         * Set the value of calle
         *
         * @return  self
         */
        public function setCalle($calle)
        {
                $this->calle = $calle;

                return $this;
        }

        /**
         * Get the value of ref
         */
        public function getRef()
        {
                return $this->ref;
        }

        /**
         * Set the value of ref
         *
         * @return  self
         */
        public function setRef($ref)
        {
                $this->ref = $ref;

                return $this;
        }

        /**
         * Get the value of tel
         */
        public function getTel()
        {
                return $this->tel;
        }

        /**
         * Set the value of tel
         *
         * @return  self
         */
        public function setTel($tel)
        {
                $this->tel = $tel;

                return $this;
        }

        /**
         * Get the value of tel2
         */
        public function getTel2()
        {
                return $this->tel2;
        }

        /**
         * Set the value of tel2
         *
         * @return  self
         */
        public function setTel2($tel2)
        {
                $this->tel2 = $tel2;

                return $this;
        }
    }

?>