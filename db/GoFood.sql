CREATE DATABASE GoFooD;
use GoFooD;
CREATE TABLE DEPARTAMENT(
	Id int primary key auto_increment,
    nameDepartament varchar(100)
);
CREATE TABLE PAYMENTMETHOD(
	Id int primary key auto_increment,
    TypePay varchar(100)
);
CREATE TABLE ROL(
	Id int primary key auto_increment,
    rol varchar(50) not null,
    descripcion varchar(500)
);
CREATE TABLE USERS(
	Id int primary key auto_increment,
    NameUSer varchar(100) not null,
    Addres varchar(100) not null,
    Passwords varchar(200) not null,
    rol int,
    FOREIGN KEY (rol) REFERENCES ROL(Id)
);
CREATE TABLE CATEGORA(
	Id int primary key auto_increment,
    nombreCateg varchar(100) not null
);
CREATE TABLE PRODUCT(
	Id int primary key auto_increment,
    nameProduct varchar(500) not null,
    Price double not null,
    photo longblob not null,
    stok double not null,
    descriptions varchar(500),
    conditions int not null, /*EL CAMPO ES BINARIO (0 SI ESTA EN OFERTA Y 1 SI NO LO ESTA)*/
    IdCateg int,
    foreign key (IdCateg) references CATEGORA(Id) 
);
CREATE TABLE ADDRESS(
	Id int primary key auto_increment,
    IdUsers int not null,
    Departament int not null,
    municipality varchar(100) not null,
    Street varchar(500) not null,
    refPlace varchar(1000),
    tel varchar(50) not null,
    tel2 varchar(50),
    FOREIGN KEY (IdUsers) REFERENCES USERS(Id),
    FOREIGN KEY (Departament) REFERENCES DEPARTAMENT(Id)
);
CREATE TABLE CART(
	Id int primary key auto_increment,
    IdUsers INT,
    IdProducto INT,
    
	foreign key(IdUsers) references USERS(Id),
    foreign key(IdProducto) references PRODUCT(Id)
);
CREATE TABLE ORDERS(
	Id int primary key auto_increment,
    IdUser int NOT NULL,
    IdPaymentMethod int not null,
    IdAdress int not null,
    conditions int, /*campo binario condicion si esta en proceso de entrega o no*/
    suTotal double not null,
    Total double not null,
    fecha DATE,
    eliminadoLogic int,
    foreign key(IdUser) references USERS(Id),
    foreign key(IdPaymentMethod) references PAYMENTMETHOD(Id),
    foreign key(IdAdress) references ADDRESS(Id)
);
CREATE TABLE ORDERS_DETAIL(
	IdOrder INT,
    IdProducto INT,
    Price DOUBLE,
    FECHA date,
	foreign key(IdOrder) references ORDERS(Id),
    foreign key(IdProducto) references PRODUCT(Id)
);
INSERT INTO ROL (rol,descripcion) VALUES ('USUARIO','Tiene derecho solo a poder comprar en este sitio y ver sus compras crud de su carrito de compras');
INSERT INTO ROL (rol,descripcion) VALUES ('EMPLEADO','No definido');
INSERT INTO ROL (rol,descripcion) VALUES ('ADMINISTRADOR','Tiene derecho a casi todas las opciones de esta pagina web');

INSERT INTO USERS (NAMEUSER,ADDRES,PASSWORDS,ROL) VALUES ('EMPLEADO 1','EMPLEADO1@GMAIL.COM','EMPLEADO',2);
INSERT INTO USERS (NAMEUSER,ADDRES,PASSWORDS,ROL) VALUES ('EMPLEADO 2','EMPLEADO2@GMAIL.COM','EMPLEADO2',2);
INSERT INTO USERS (NAMEUSER,ADDRES,PASSWORDS,ROL) VALUES ('ADMINISTRADOR','SOYADMIN@GMAIL.COM','ADMIN',3);



INSERT INTO PAYMENTMETHOD (TypePay) VALUES ('CREDITO');
INSERT INTO PAYMENTMETHOD (TypePay) VALUES ('CONTADO');

INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('AHUACHAPAN');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('CABAÑAS');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('CHALATENANGO');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('CUCATLAN');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('LA LIBERTAD');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('LA PAZ');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('LA UNION');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('MORAZAN');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('SAN MIGUEL');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('SAN SALVADOR');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('SAN VICENTE');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('SANTA ANA');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('SONSONATE');
INSERT INTO DEPARTAMENT (nameDepartament) VALUES ('USULUTAN');

INSERT INTO CATEGORA (nombreCateg) VALUES ('HIGIENE');
INSERT INTO CATEGORA (nombreCateg) VALUES ('FRUTAS Y VERDURAS');
INSERT INTO CATEGORA (nombreCateg) VALUES ('CARNE Y EMBUTIDOS');
INSERT INTO CATEGORA (nombreCateg) VALUES ('GRANOS BASICOS');
INSERT INTO CATEGORA (nombreCateg) VALUES ('BEBIDAS');
INSERT INTO CATEGORA (nombreCateg) VALUES ('OTROS');

