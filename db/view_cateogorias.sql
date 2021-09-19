use gofood;

USE `gofood`;
CREATE  OR REPLACE VIEW `view_higiene` AS
select p.id,photo,nameProduct,c.nombreCateg,descriptions,stok,price from product p inner join categora c on p.IdCateg = c.Id where IdCateg = 1 AND CONDITIONS = 1 AND STOK > 0;

USE `gofood`;
CREATE  OR REPLACE VIEW `view_frutas` AS
select p.id,photo,nameProduct,c.nombreCateg,descriptions,stok,price from product p inner join categora c on p.IdCateg = c.Id where IdCateg = 2 AND CONDITIONS = 1  AND STOK > 0;

USE `gofood`;
CREATE  OR REPLACE VIEW `view_carne` AS
select p.id,photo,nameProduct,c.nombreCateg,descriptions,stok,price from product p inner join categora c on p.IdCateg = c.Id where IdCateg = 3 AND CONDITIONS = 1  AND STOK > 0;

USE `gofood`;
CREATE  OR REPLACE VIEW `view_granos` AS
select p.id,photo,nameProduct,c.nombreCateg,descriptions,stok,price from product p inner join categora c on p.IdCateg = c.Id where IdCateg = 4 AND CONDITIONS = 1  AND STOK > 0;

USE `gofood`;
CREATE  OR REPLACE VIEW `view_bebidas` AS
select p.id,photo,nameProduct,c.nombreCateg,descriptions,stok,price from product p inner join categora c on p.IdCateg = c.Id where IdCateg = 5 AND CONDITIONS = 1  AND STOK > 0;

USE `gofood`;
CREATE  OR REPLACE VIEW `view_otros` AS
select p.id,photo,nameProduct,c.nombreCateg,descriptions,stok,price from product p inner join categora c on p.IdCateg = c.Id where IdCateg = 6 AND CONDITIONS = 1  AND STOK > 0;

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
        ON DE.ID = A.DEPARTAMENT
