
CREATE DATABASE IF NOT EXISTS codifica;

CREATE TABLE IF NOT EXISTS filmes (
id BIGINT AUTO_INCREMENT,
titulo VARCHAR(255) NOT NULL,
titulo_original VARCHAR(255) NULL,
ano_de_lancamento INT NULL,
restricao_de_idade INT NULL,
duracao INT NULL,
categorias VARCHAR(255) NULL,
avaliacao DECIMAL(3,1) NULL,
created_at TIMESTAMP DEFAULT current_timestamp,
updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
deleted_at TIMESTAMP NULL DEFAULT NULL,
PRIMARY KEY (id)
);
