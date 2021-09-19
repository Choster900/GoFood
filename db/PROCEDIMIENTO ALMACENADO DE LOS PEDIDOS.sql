use gofood;

/*INSERT INTO ADDRESS (IDUSERS,DEPARTAMENT,MUNICIPALITY,STREET,REFPLACE,TEL,TEL2) VALUES (1,1,'COLON','SENDA 11 ORIENTE','ARRIBA DE LA CACHA','71405653','71056532');*/

/*------------------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_CARRITO`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_CARRITO`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CARRITO`(
	in USUARIO int,
    in PRODUCTO int
)
BEGIN
	INSERT INTO CART (IDUSERS,IDPRODUCTO) VALUES (USUARIO,PRODUCTO);
    SELECT @STOK := stok FROM PRODUCT WHERE ID = PRODUCTO;
	UPDATE PRODUCT SET STOK = (@STOK-1) WHERE ID = PRODUCTO;
END$$
DELIMITER ;
;
/*------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------*/




/*------------------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_PEDIDOS`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_PEDIDOS`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_PEDIDOS`(
	in usuario int,
    in metodPa int
)
BEGIN
	DECLARE GASTO DOUBLE;
    DECLARE DIRECCION INT;
    DECLARE ESTADO INT;
    DECLARE BORRAR INT;
    DECLARE FECH DATE;
    SET FECH = CURDATE();
    SET BORRAR = 1;
    SET ESTADO = 1;
	
    SET GASTO = (SELECT SUM(P.PRICE) FROM CART C INNER JOIN PRODUCT P ON C.IDPRODUCTO=P.ID WHERE C.IDUSERS=usuario);
	SET DIRECCION = (SELECT ID FROM ADDRESS WHERE IDUSERS = USUARIO);

	INSERT INTO ORDERS (IDUSER,IDPAYMENTMETHOD,IdAdress,CONDITIONS,SUTOTAL,TOTAL,FECHA,ELIMINADOLOGIC) VALUES (usuario,metodPa,DIRECCION,ESTADO,GASTO,GASTO*1.13,CURDATE(),1);
END$$

DELIMITER ;
;
/*------------------------------------------------------------------------------------------------------------------*/
/*CALL SP_PEDIDOS(2,1);*/
/*SELECT ROUND(TOTAL,2) FROM ORDERS; PARA ESCOGER DOS DECIMALES EN LA CONSULTA*/
SELECT * FROM ORDERS;
/*-------------------------------------------------------------------------------------------------------------------------*/

USE `gofood`;
DROP procedure IF EXISTS `SP_DETALLE`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_DETALLE`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DETALLE`(
	IN USUARIO INT
)
BEGIN 
	SELECT @ID := MAX(ID) FROM ORDERS WHERE IDUSER =USUARIO;
    INSERT INTO ORDERS_DETAIL (IDORDER,IDPRODUCTO,PRICE,FECHA)
	SELECT @ID,P.ID,P.PRICE,CURDATE()
    FROM CART C 
    INNER JOIN PRODUCT P 
    ON P.ID = C.IDPRODUCTO WHERE C.IDUSERS = USUARIO;
END$$

DELIMITER ;
;
CALL SP_DETALLE(2);
SELECT * FROM CART;
/*---------------------------------------------------------------------------------------------------------------------------------------*/

	SELECT
    O.ID,
    P.NAMEPRODUCT,
    P.PRICE,
	IF (O.CONDITIONS=1,"ENVIADO","ENTREGADO") AS ESTADO
    FROM ORDERS_DETAIL D  
    INNER JOIN ORDERS O 
    ON O.ID = D.IDORDER
    INNER JOIN PRODUCT P
    ON P.ID = D.IDPRODUCTO
    WHERE O.IDUSER = 1 ORDER BY O.ID ASC;
    
USE `gofood`;
CREATE  OR REPLACE VIEW `view_orders` AS
    SELECT 
		O.ID,
        U.NAMEUSER,
        DE.NAMEDEPARTAMENT,
        A.MUNICIPALITY,
        STREET,
        REFPLACE,
        TEL,
        TEL2,
		IF (O.CONDITIONS=1,"ENVIADO","ENTREGADO") AS ESTADO,
		IF (O.IDPAYMENTMETHOD=1,"CREDITO","CONTADO") AS METODO
		FROM ORDERS O
        INNER JOIN USERS U
        ON U.ID = O.IDUSER
        INNER JOIN ADDRESS A
        ON A.ID = O.IDADRESS
        INNER JOIN DEPARTAMENT DE
        ON A.ID = DE.ID;

/*-------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_PRODUCTO_ENTREGADO`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_PRODUCTO_ENTREGADO`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_PRODUCTO_ENTREGADO`(
	in ORDEN int
)
BEGIN
	UPDATE ORDERS SET CONDITIONS = 2 WHERE ID = ORDEN;
END$$
DELIMITER ;
;
/*---------------------------------------------------------------------------------------------------*/
	USE `gofood`;
	DROP procedure IF EXISTS `SP_FILTRADO_FECHA`;

	USE `gofood`;
	DROP procedure IF EXISTS `gofood`.`SP_FILTRADO_FECHA`;	
	;
	DELIMITER $$
	USE `gofood`$$
	CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_FILTRADO_FECHA`(
		in FECHA VARCHAR(100)
	)
	BEGIN
		select 
	O.ID, 
	U.NAMEUSER,
	IF (O.CONDITIONS=1,"ENVIADO","ENTREGADO") AS ESTADO,
	SUTOTAL,
	FORMAT(TOTAL,2) AS TOTAL,
	OD.FECHA
	from ORDERS O 
	INNER JOIN ORDERS_DETAIL OD 
	ON O.ID = OD.IDORDER 
	INNER JOIN USERS U
	ON U.ID = O.IDUSER
	WHERE OD.FECHA = FECHA GROUP BY O.ID;
	END$$
	DELIMITER ;
	;
/*------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_FILTRADO_ESTADO`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_FILTRADO_ESTADO`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_FILTRADO_ESTADO`(
	in ESTADO VARCHAR(100)
)
BEGIN
	select 
	O.ID, 
	U.NAMEUSER,
	IF (O.CONDITIONS=1,"ENVIADO","ENTREGADO") AS ESTADO,
	SUTOTAL,
	FORMAT(TOTAL,2) AS TOTAL,
	OD.FECHA
	from ORDERS O 
	INNER JOIN ORDERS_DETAIL OD 
	ON O.ID = OD.IDORDER 
	INNER JOIN USERS U
	ON U.ID = O.IDUSER
	WHERE O.CONDITIONS = ESTADO GROUP BY O.ID;
END$$
DELIMITER ;
;	
/*--------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_COMPRAS_CLIENTES`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_COMPRAS_CLIENTES`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_COMPRAS_CLIENTES`(
	in usuario int
)
BEGIN
	SELECT 
		O.ID,
        U.NAMEUSER,
        DE.NAMEDEPARTAMENT,
        A.MUNICIPALITY,
        STREET,
        REFPLACE,
        TEL,
        TEL2,
		IF (O.CONDITIONS=1,"ENVIADO","ENTREGADO") AS ESTADO,
		IF (O.IDPAYMENTMETHOD=1,"CREDITO","CONTADO") AS METODO
		FROM ORDERS O
        INNER JOIN USERS U
        ON U.ID = O.IDUSER
        INNER JOIN ADDRESS A
        ON A.ID = O.IDADRESS
        INNER JOIN DEPARTAMENT DE
        ON A.ID = DE.ID
        WHERE O.IDUSER = USUARIO AND ELIMINADOLOGIC = 1;
END$$
DELIMITER ;
;	
SELECT * FROM ORDERS;
/*--------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_ELIMINADO_LOGICO`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_ELIMINADO_LOGICO`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMINADO_LOGICO`(
	in ORDEN int
)
BEGIN
	UPDATE ORDERS SET ELIMINADOLOGIC = 2 WHERE ID = ORDEN;
END$$
DELIMITER ;
;
/*--------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_SUMA_CARRITO`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_SUMA_CARRITO`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SUMA_CARRITO`(
	in USUARIO int
)
BEGIN
	SELECT SUM(PRICE) AS SUMA FROM CART C INNER JOIN PRODUCT P ON P.ID = C.IDPRODUCTO WHERE IDUSERS = USUARIO;
END$$
DELIMITER ;
;
/*-----------------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_ELIMIAR_CARRITO`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_ELIMIAR_CARRITO`;	
;
DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ELIMIAR_CARRITO`(
	in FILA int
)
BEGIN
	
    SELECT @PROD := IDPRODUCTO FROM CART WHERE ID = FILA;
    
    SELECT @STOK := stok FROM PRODUCT WHERE ID = @PROD;
	UPDATE PRODUCT SET STOK = (@STOK+1) WHERE ID = @PROD;
    
	DELETE FROM CART WHERE ID = FILA;
END$$
DELIMITER ;
;
