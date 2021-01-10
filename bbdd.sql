CREATE DATABASE crud;

CREATE TABLE crud.usuarios 
    (dni int PRIMARY KEY NOT NULL,
    nombre varchar(25) NOT NULL,
    apellido varchar(25) NOT NULL,
    fecha_nacimiento date NOT NULL
    );



