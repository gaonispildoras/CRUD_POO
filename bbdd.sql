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




