CREATE DATABASE IF NOT EXISTS db_produtos;

USE db_produtos;

-- Criando a tabela de categorias
CREATE TABLE IF NOT EXISTS tb_categorias (
	id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cor VARCHAR(255) NOT NULL,
    created_at	TIMESTAMP DEFAULT current_timestamp,
	updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
	deleted_at	TIMESTAMP NULL DEFAULT NULL
);

-- Criando index na coluna de nome para melhor desempenho
CREATE INDEX idx_categoria_nome ON tb_categorias(nome);


-- Criando a tabela de unidades de medida
CREATE TABLE IF NOT EXISTS tb_unidades_medida (
	id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(20) NOT NULL,
    created_at	TIMESTAMP DEFAULT current_timestamp,
	updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
	deleted_at	TIMESTAMP NULL DEFAULT NULL
);

-- Criando index na colunas de nome para melhor desempenho
CREATE INDEX idx_unidade_medida_nome ON tb_unidades_medida(nome);


-- Criando a tabela de produtos
-- Utilizando as chaves estrangeiras para garantir uma ligação entre tabelas
CREATE TABLE IF NOT EXISTS tb_produtos (
	id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	sku VARCHAR(16) NOT NULL,
    nome VARCHAR(100) NOT NULL, 
    valor DECIMAL(9, 2) NOT NULL,
    id_categoria BIGINT NOT NULL,
	quantidade BIGINT NOT NULL,
    id_unidade_medida BIGINT NOT NULL,
    created_at	TIMESTAMP DEFAULT current_timestamp,
	updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
	deleted_at	TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (id_categoria) REFERENCES tb_categorias (id),
    FOREIGN KEY (id_unidade_medida) REFERENCES tb_unidades_medida (id)
);

-- Criando indexes nas colunas de categoria e unidade de medida para melhor desempenho
CREATE INDEX idx_produtos_categoria ON tb_produtos(id_categoria);
CREATE INDEX idx_produtos_unidade_medida ON tb_produtos(id_unidade_medida);
