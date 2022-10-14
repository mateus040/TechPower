create database db_techpower;

use db_techpower;

create table usuarios(
	id_usuario int auto_increment not null,
    nome varchar(30) not null,
    telefone varchar(30) not null,
    email varchar(40) not null,
    senha varchar(32),
    primary key(id_usuario)
);

select * from usuarios;