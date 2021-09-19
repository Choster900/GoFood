<?php
    class OrdersModelo extends Model{
        /* Campos de Cart */
        private $idCart;
        private $idUser;
        private $idProduct;
        /* Fin de Cart */

        /* METODO DE PAGO */
        private $metodoPago;
        /* FIN DE METODOS DE PAGO */

        private $idorden;

        public function getIdCart()                 {return $this->idCart;}
        public function getIdUser()                 {return $this->idUser;}
        public function getIdProduct()              {return $this->idProduct;}
        /* metodo */
        public function getMetodoPago()             {return $this->metodoPago;}


        public function setIdCart($idCart)          {$this->idCart = $idCart;return $this;}
        public function setIdUser($idUser)          {$this->idUser = $idUser;return $this;}
        public function setIdProduct($idProduct)    {$this->idProduct = $idProduct;return $this;}
        /* metodo */
        public function setMetodoPago($metodoPago){$this->metodoPago = $metodoPago;return $this;}

        public function ShowCart(){
            $cart = [];
            $sql = "CALL sp_showcart (".$this->idUser.")";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $cart[] = $row;
            }
            return $cart;
        }
        public function insertarCarrito(){
            $insert = "CALL SP_CARRITO (".$this->idUser.",".$this->idProduct.")";
            $consulta = $this->getDb()->conectar()->query($insert);
            return ($consulta==TRUE)?true:false;
        }
        public function AddOrder(){
            $insert = "CALL SP_PEDIDOS (".$this->idUser.",".$this->metodoPago.")";
            $consulta = $this->getDb()->conectar()->query($insert);
            return ($consulta==TRUE)?true:false;
        }
        public function detalleOrders(){
            $insert = "CALL SP_DETALLE (".$this->idUser.")";
            $consulta = $this->getDb()->conectar()->query($insert);
            return ($consulta==TRUE)?true:false;
        }
        public function showFactura(){
            $factura = [];
            $sql = "CALL showFactura (".$this->idUser.")";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $factura[] = $row;
            }
            return $factura;
        }
        public function view_orders(){
            $orders = [];
            $sql = "SELECT * FROM view_orders";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $orders[] = $row;
            }
            return $orders;
        }
        public function entregado(){
            $insert = "CALL SP_PRODUCTO_ENTREGADO (".$this->idorden.")";
            $consulta = $this->getDb()->conectar()->query($insert);
            return ($consulta==TRUE)?true:false;
        }
        public function  EliminarCarrito(){
            $insert = "	DELETE FROM CART WHERE IDUSERS = (".$this->idUser.")";
            $consulta = $this->getDb()->conectar()->query($insert);
            return ($consulta==TRUE)?true:false;
        }
        public function ComprasCliente(){
            $compras = [];
            $sql = "CALL SP_COMPRAS_CLIENTES(".$this->idUser.")";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $compras[] = $row;
            }
            return $compras;
        }
        public function  EliminadoLogico(){
            $insert = "	CALL SP_ELIMINADO_LOGICO (".$this->idorden.")";
            $consulta = $this->getDb()->conectar()->query($insert);
            return ($consulta==TRUE)?true:false;
        }
        public function sumaProduct(){
            $total = [];
            $sql = "CALL SP_SUMA_CARRITO (".$this->idUser.")";
            $view = $this->getDb()->conectar()->query($sql);
            while($row = $view -> fetch_assoc()){
                $total[] = $row;
            }
            return $total;
        }
        public function EliminarCart(){
            $insert = "CALL SP_ELIMIAR_CARRITO(".$this->idCart.")";
            $consulta = $this->getDb()->conectar()->query($insert);
            return ($consulta==TRUE)?true:false;
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
    }
?>