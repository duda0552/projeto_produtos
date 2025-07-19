--Criando o banco de dados
CREATE DATABASE produtos;

--Criando tabela de produtos
CREATE TABLE produtos (
id int AUTO_INCREMENT PRIMARY KEY,
nome varchar (100),
preco decimal(10,2),
quantidade varchar(100),
categoria varchar(100)
);

--Criando tabela de cadastro
CREATE TABLE cadastro (
id int AUTO_INCREMENT PRIMARY KEY,
nome varchar (200),
telefone varchar(11),
email varchar(100),
senha varchar(11)
);

--Inserindo um primeiro cadastro manualmente
INSERT INTO cadastro (nome, email, telefone, senha)
VALUES ('Eduarda','eduarda.lira@gmail.com','40028922','@1234')