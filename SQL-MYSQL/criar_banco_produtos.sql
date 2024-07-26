
CREATE DATABASE  gestao_produtos;

USE gestao_produtos;

CREATE TABLE produtos ( 
id BIGINT NOT NULL AUTO_INCREMENT,
nome VARCHAR(255),
sku VARCHAR(50),
descricao TEXT,
categoria VARCHAR(50),
preco DECIMAL(10, 2),
unidade_medida	VARCHAR(50),
peso DECIMAL(10, 2),
quantidade_estoque	BIGINT,
fabricante	VARCHAR(50),
fornecedor	VARCHAR(50),
deleted_at	TIMESTAMP NULL DEFAULT NULL,
created_at	TIMESTAMP DEFAULT current_timestamp,
updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
PRIMARY KEY (id)
);
