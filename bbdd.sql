CREATE DATABASE crud;

CREATE TABLE crud.usuarios 
    (id_usuario int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario varchar(25) NOT NULL,
    contraseña varchar(25) NOT NULL,
    correo VARCHAR(25) NOT NULL
    );

CREATE TABLE crud.admin2 
    (id_usuario int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario varchar(25) NOT NULL,
    contraseña varchar(25) NOT NULL,
    correo VARCHAR(25) NOT NULL
    );

CREATE TABLE crud.info_usuarios
    (id_info int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre varchar (25) NOT NULL,
    apellidos varchar (25) NOT NULL,
    edad int (3) NOT NULL,
    correo varchar (25) NOT NULL,
    direccion varchar (25) NOT NULL,
    );


