<?php
    class productoModelo extends Model{
        private $id;
        private $name;
        private $price;
        private $image;
        private $stok;
        private $description;
        private $conditions;
        private $categ;

        public function __construct()
        {
            parent::__construct();
        }

        public function getId()                             {return $this->id;}
        public function getName()                           {return $this->name;}
        public function getPrice()                          {return $this->price;}
        public function getImage()                          {return $this->image;}
        public function getStok()                           {return $this->stok;}
        public function getDescription()                    {return $this->description;}
        public function getCateg()                          {return $this->categ;}
        public function getConditions()                     {return $this->conditions;}



        public function setId($id)                          {$this->id = $id;return $this;}
        public function setName($name)                      {$this->name = $name;return $this;}
        public function setPrice($price)                    {$this->price = $price; return $this;}
        public function setImage($image)                    {$this->image = $image;return $this;}
        public function setStok($stok)                      {$this->stok = $stok;return $this;}
        public function setDescription($description)        {$this->description = $description;return $this;}
        public function setCateg($categ)                    {$this->categ = $categ;return $this;}
        public function setConditions($conditions)          {$this->conditions = $conditions;return $this;}

        public function listcategory(){
            $categoria = [];
            $sql = "SELECT * FROM CATEGORA";
            $select = $this->getDb()->conectar()->query($sql);
            while($row = $select -> fetch_assoc()){
                $categoria[]= $row;
            }
            return $categoria;
        }
        public function AddProducts(){
            $sql = "CALL sp_insertProduct('".$this->name."',
                                            ".$this->price.",
                                            '".$this->image."',
                                            ".$this->stok.",
                                            '".$this->description."',
                                            ".$this->conditions.",
                                            ".$this->categ.")";
            $insert = $this->getDb()->conectar()->query($sql);
            return ($insert==TRUE)?true:false;   
        }
        public function filtrar(){
            $higiene = [];
            $sql = "SELECT * FROM PRODUCT WHERE ID = (".$this->id.")";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $higiene[] = $row;
            }
            return $higiene;
        }
        
        public function viewProduct(){
            $product = [];
            $sql = "SELECT * FROM view_product";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $product[] = $row;
            }
            return $product;
        }
        public function UpdateProduct(){ 
            $sql = "CALL updateProduct(".$this->id.",'".$this->name."',".$this->price.",'".$this->image."',".$this->stok.",'".$this->description."',".$this->conditions.",".$this->categ.")";
            $insert = $this->getDb()->conectar()->query($sql);
            return ($insert==TRUE)?true:false;   
        }
        public function deleteProduct(){
            $sql = "DELETE FROM PRODUCT WHERE Id = (".$this->id.")";
            $insert = $this->getDb()->conectar()->query($sql);
            return ($insert==TRUE)?true:false;   
        }
        public function filtrado1(){
            $higiene = [];
            $sql = "select * from view_higiene;";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $higiene[] = $row;
            }
            return $higiene;
        }

        

    }
?>