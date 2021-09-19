DELIMITER ;
USE `gofood`;
DROP procedure IF EXISTS `InsertUSers`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`InsertUSers`;
;

DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertUSers`(
	in nombre varchar(100),
    in correo varchar(100),
    in contra varchar(200) ,
    in rol int
)
BEGIN
	INSERT INTO USERS (NameUser,Addres,Passwords,rol) VALUES (nombre,correo,contra,rol);
END$$
DELIMITER ;
;
/*---------------------------------*/
DELIMITER ;
USE `gofood`;
DROP procedure IF EXISTS `insertDireccion`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`insertDireccion`;
;

DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDireccion`(
	in usuario int,
    in Depa int,
    in municipio varchar(200),
    in calle varchar(200),
    in ref varchar(200),
    in tel varchar(50),
    in te2 varchar(50)
)
BEGIN
	INSERT INTO address(IdUsers,Departament,municipality,Street,refPlace,tel,tel2) 
    VALUES (usuario,Depa,municipio,calle,ref,tel,te2);
END$$
DELIMITER ;
;
/*-----------------------------------------------------------------------------------------------------------*/

USE `gofood`;
DROP procedure IF EXISTS `sp_insertProduct`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`sp_insertProduct`;	
;

DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertProduct`(
	in nombre varchar(100),
    in precio double,
    in photo longblob,
    in stok double,
    in descripcion varchar(500),	
    in condicion int,
    in categoria int
)
BEGIN
	INSERT INTO PRODUCT (nameProduct,price,photo,stok,descriptions,conditions,IdCateg) VALUES (nombre,precio,photo,stok,descripcion,condicion,categoria);
END$$

DELIMITER ;
;
/*---------------------------------------------------------------------------------------------------------*/

USE `gofood`;
DROP procedure IF EXISTS `sp_SelecIdUsers`;

DELIMITER $$
USE `gofood`$$
CREATE PROCEDURE `sp_SelecIdUsers`(
	in Usuario varchar(100),
    in contra varchar(100)
)
BEGIN
	select Id FROM USERS WHERE NameUser = Usuario AND Passwords = contra;
END$$


/*------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_USERS`;

DELIMITER $$
USE `gofood`$$
CREATE PROCEDURE `SP_USERS` (
	in nombres varchar(100),
    in correo varchar(100),
    in contra varchar(100)
)
BEGIN
	INSERT INTO USERS (NAMEUSER,ADDRES,PASSWORDS,ROL) VALUES (nombres,correo,contra,1);
END$$
/*------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_ADDRESS`;

DELIMITER $$
USE `gofood`$$
CREATE PROCEDURE `SP_ADDRESS` (
	in nombres varchar(100),
    in correo varchar(100),
    in contra varchar(100)
)
BEGIN
	INSERT INTO USERS (NAMEUSER,ADDRES,PASSWORDS,ROL) VALUES (nombres,correo,contra,1);
END$$
/*------------------------------------------------------------------------------------------------------*/

USE `gofood`;
DROP procedure IF EXISTS `sp_showcart`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`sp_showcart`;
;

DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_showcart`(
	in usuario int
)
BEGIN
	select c.Id,
			p.photo,
            p.nameProduct,
            ca.nombreCateg,
            p.price,
            p.descriptions,
            p.conditions
            from cart c 
            inner join product p 
            on p.id = c.idproducto 
            inner join categora ca
            on ca.id = p.Idcateg
            where c.idUsers = usuario;
END$$

DELIMITER ;
;
/*---------------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `updateProduct`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`updateProduct`;
;

DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProduct`(
	in codigo int,
	in nombre varchar(500),
    in precio double,
    in foto longblob,
    in cantidad int,
    in descripcion varchar(500),
    in condicion int,
    in categoria int
)
BEGIN
	UPDATE PRODUCT SET nameProduct = nombre,
						price = precio,
                        photo = foto,
                        stok = cantidad,
                        descriptions = descripcion,
                        conditions = condicion,
                        Idcateg = categoria where Id = codigo;
END$$
DELIMITER ;
;
/*---------------------------------------------------------------------------------------------------------------*/

/*+---------------------------------------------------------------------------------------------------------------*/
USE `gofood`;
CREATE  OR REPLACE VIEW `view_product` AS
select p.id,photo,nameProduct,c.nombreCateg,descriptions,stok,price,if(conditions=1,'DISPONIBLE','NO DISPONIBLE') AS CONDICION from product p inner join categora c on p.IdCateg = c.Id  order by p.Id asc;

/*-----------------------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `showFactura`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`showFactura`;
;

DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `showFactura`(
	in usuario int
)
BEGIN
	SELECT D.IDORDER,
			P.NAMEPRODUCT, 
            P.DESCRIPTIONS,
            D.PRICE,
            max(FECHA)
            FROM ORDERS_DETAIL D 
            INNER JOIN ORDERS O 
            ON D.IDORDER = O.ID 
            INNER JOIN PRODUCT P
            ON P.ID = D.IDPRODUCTO WHERE O.IDUSER = 3;
END$$
DELIMITER ;
;
/*----------------------------------------------------------------------------------------------------------------*/
USE `gofood`;
DROP procedure IF EXISTS `SP_FACTURA_DETALLE`;

USE `gofood`;
DROP procedure IF EXISTS `gofood`.`SP_FACTURA_DETALLE`;
;

DELIMITER $$
USE `gofood`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_FACTURA_DETALLE`(
	in NumOrden int
)
BEGIN
	SELECT IDORDER,
		P.NAMEPRODUCT,
        P.DESCRIPTIONS,
        P.PRICE,
        D.FECHA,
        SUTOTAL,
		FORMAT(TOTAL,2) AS TOTAL
        FROM ORDERS_DETAIL D 
        INNER JOIN PRODUCT P 
        ON P.ID = D.IDPRODUCTO 
        INNER JOIN ORDERS O 
        ON O.ID = D.IDORDER
        WHERE IDORDER = NumOrden;
        
END$$
DELIMITER ;
;
/*--------------------------------------------------------------------------------------*/

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
        ON DE.ID = A.DEPARTAMENT
        WHERE O.IDUSER = usuario AND ELIMINADOLOGIC = 1;
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
