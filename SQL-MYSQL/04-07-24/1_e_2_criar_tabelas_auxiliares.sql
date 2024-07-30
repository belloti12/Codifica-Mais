
CREATE TABLE IF NOT EXISTS categorias (
id BIGINT AUTO_INCREMENT,
nome_categoria VARCHAR(255) NOT NULL,
created_at	TIMESTAMP DEFAULT current_timestamp,
updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
deleted_at	TIMESTAMP NULL DEFAULT NULL,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS unidades_medida (
id BIGINT AUTO_INCREMENT,
nome_unidade_medida VARCHAR(255) NOT NULL,
created_at	TIMESTAMP DEFAULT current_timestamp,
updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
deleted_at	TIMESTAMP NULL DEFAULT NULL,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS fabricantes (
id BIGINT AUTO_INCREMENT,
nome_fabricante VARCHAR(255) NOT NULL,
created_at	TIMESTAMP DEFAULT current_timestamp,
updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
deleted_at	TIMESTAMP NULL DEFAULT NULL,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS fornecedores (
id BIGINT AUTO_INCREMENT,
nome_fornecedor VARCHAR(255) NOT NULL,
created_at	TIMESTAMP DEFAULT current_timestamp,
updated_at	TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp,
deleted_at	TIMESTAMP NULL DEFAULT NULL,
PRIMARY KEY (id)
);
