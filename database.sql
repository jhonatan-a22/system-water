
CREATE DATABASE facturacion;
	use facturacion;

CREATE TABLE roles (
  id int PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(20),
  UNIQUE(nombre)
);
INSERT INTO roles VALUES(1, 'Administrador'), (2, 'Supervisor'), (3, 'Plomero'), (4, 'Afiliado');


CREATE TABLE sectores (
  id int PRIMARY KEY AUTO_INCREMENT,
  sector varchar(100),
  status int
);
INSERT INTO sectores VALUES(1, 'Maica', 1);

CREATE TABLE usuarios (
  id int PRIMARY KEY AUTO_INCREMENT,
  nombres varchar(50),
  apellidos varchar(50),
  direccion varchar(100),
  provincia varchar(100),
  id_sectores int,
  telefono int,
  usuario varchar(50),
  clave varchar(100),
  id_roles int,
  regante int,
  estatus int,
  UNIQUE(usuario),
  FOREIGN KEY (id_roles) REFERENCES roles (id),
  FOREIGN KEY (id_sectores) REFERENCES sectores (id)
);
INSERT INTO usuarios VALUES (1, 'Jhonatan', 'Rojas', 'Av. Maica', 'Sacaba', 1, 76935491, '12556193', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, 1);


create table modulos(
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50),
  link VARCHAR(80)
);
  insert into modulos values (1, "Inicio", "inicio");
  insert into modulos values (2, "Afiliados - sectores", "sectores");
  insert into modulos values (3, "Afiliados - usuarios", "usuarios");
  insert into modulos values (4, "Medidores", "medidores");
  insert into modulos values (5, "Facturacion - precios", "facturacion/precios");
  insert into modulos values (6, "Facturacion", "facturacion");
  insert into modulos values (7, "Facturacion - buscar", "facturacion/search");

  

create table privilegios(
  id INT PRIMARY KEY AUTO_INCREMENT, 
  id_roles INT,
  id_modulos INT,
  leer INT,
  agregar INT,
  modificar INT,
  eliminar INT,
  FOREIGN KEY (id_roles) REFERENCES roles (id),
  FOREIGN KEY (id_modulos) REFERENCES modulos (id)
);

  insert into privilegios values (1, 1, 1, 1, 0, 0, 0);
  insert into privilegios values (2, 1, 2, 1, 1, 1, 1);
  insert into privilegios values (3, 1, 3, 1, 1, 1, 1);
  insert into privilegios values (4, 1, 4, 1, 1, 1, 1);
  insert into privilegios values (5, 1, 5, 1, 0, 1, 0);
  insert into privilegios values (6, 1, 6, 1, 0, 0, 0);
  insert into privilegios values (7, 1, 7, 1, 0, 0, 0);

  insert into privilegios values (8, 2, 1, 1, 0, 0, 0);
  insert into privilegios values (9, 2, 2, 1, 1, 1, 1);
  insert into privilegios values (10, 2, 3, 1, 1, 1, 1);
  insert into privilegios values (11, 2, 4, 1, 1, 1, 1);
  insert into privilegios values (12, 2, 5, 1, 0, 1, 0);
  insert into privilegios values (13, 2, 6, 1, 0, 0, 0);
  insert into privilegios values (14, 2, 7, 1, 0, 0, 0);

  insert into privilegios values (15, 3, 1, 1, 0, 0, 0);
  insert into privilegios values (16, 3, 4, 1, 0, 1, 0);

  insert into privilegios values (17, 4, 1, 1, 0, 0, 0);


CREATE TABLE medidores (
  id int PRIMARY KEY AUTO_INCREMENT,
  medidor int,
  id_usuarios int,
  lectura int,
  fecha date,
  estado varchar(100),
  status int,
  FOREIGN KEY (id_usuarios) REFERENCES usuarios (id)
);


CREATE TABLE lecturas (
  id int PRIMARY KEY AUTO_INCREMENT,
  id_medidores int,
  lectura_anterior int,
  lectura_actual int,
  fecha_anterior date,
  fecha_actual date,
  observacion varchar(100),
  FOREIGN KEY (id_medidores) REFERENCES medidores (id)
);


CREATE TABLE precios (
  id int PRIMARY KEY AUTO_INCREMENT,
  costoafiliado float,
  costoregante float
);
INSERT INTO precios VALUES(1, 1, 10);

CREATE TABLE detalle (
  id int PRIMARY KEY AUTO_INCREMENT,
  id_medidores int,
  l_anterior int,
  l_actual int,
  periodo varchar(20),
  fecha_anterior date, 
  fecha_actual date,
  id_usuarios int,
  fecha_emision date,
  importe float,
  total float,
  status int,
  FOREIGN KEY (id_usuarios) REFERENCES usuarios (id),
  FOREIGN KEY (id_medidores) REFERENCES medidores (id)
);


CREATE TABLE factura (
  id int PRIMARY KEY AUTO_INCREMENT,
  correlativo int,
  fecha datetime,
  id_detalle int,
  FOREIGN KEY (id_detalle) REFERENCES detalle (id)
);


CREATE TABLE log (
  id int PRIMARY KEY AUTO_INCREMENT,
  id_usuarios int,
  fecha datetime,
  FOREIGN KEY (id_usuarios) REFERENCES usuarios (id)
);


