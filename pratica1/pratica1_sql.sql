create database pratica1;

use pratica1;

create table cliente(
id_cliente int not null primary key auto_increment,
nome varchar(45),
email varchar(40),
telefone char(9) );

create table colaborador(
id_colaborador int not null primary key auto_increment,
nome varchar(45),
email varchar(50),
telefone char(9)
);

create table chamados(
id_chamados int not null primary key auto_increment,
problema varchar(250),
criticidade varchar(5),
status_chamado varchar(30),
data_abertura date,
id_cliente int not null,
foreign key(id_cliente) references cliente(id_cliente),
id_colaborador int not null,
foreign key (id_colaborador) references colaborador(id_colaborador)
);