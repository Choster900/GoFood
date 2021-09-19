<?php

class graficoModelo extends Model{
    public function __construct()
    {
        parent :: __construct();
    }
    public function grafico(){
        $arreglo=[];

        $sql='SELECT fecha as dias,COUNT(ID) AS VENTAS FROM ORDERS GROUP BY FECHA;
        ';
        
        $datos = $this->getDb()->conectar()->query($sql);
        while($fila = $datos->fetch_row()){
            $arreglo[] = $fila;
        }
        return $arreglo;
    }

}

?>