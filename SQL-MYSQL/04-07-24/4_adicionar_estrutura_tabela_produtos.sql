
-- Primeiro trocando tudo o que era valor para os IDs das tabelas auxiliares
UPDATE produtos
SET fornecedor = CASE
    WHEN fornecedor = "Fornecedor A" THEN 1
    WHEN fornecedor = "Fornecedor B" THEN 2
    WHEN fornecedor = "Fornecedor C" THEN 3
    WHEN fornecedor = "Fornecedor D" THEN 4
	WHEN fornecedor = "Fornecedor E" THEN 5
    WHEN fornecedor = "Fornecedor F" THEN 6
    WHEN fornecedor = "Fornecedor G" THEN 7
    WHEN fornecedor = "Fornecedor H" THEN 8
    WHEN fornecedor = "Fornecedor I" THEN 9
    WHEN fornecedor = "Fornecedor J" THEN 10
    ELSE 11
END;

UPDATE produtos
SET fabricante = CASE
    WHEN fabricante = "Agricultor A" THEN 1
    WHEN fabricante = "Agricultor B" THEN 2
    WHEN fabricante = "Agricultor C" THEN 3
    WHEN fabricante = "Agricultor D" THEN 4
	WHEN fabricante = "Agricultor E" THEN 5
    WHEN fabricante = "Agricultor F" THEN 6
    WHEN fabricante = "Agricultor G" THEN 7
    WHEN fabricante = "Agricultor H" THEN 8
    WHEN fabricante = "Agricultor I" THEN 9
    WHEN fabricante = "Agricultor J" THEN 10
    ELSE 11
END;

UPDATE produtos
SET categoria = CASE
    WHEN categoria = "Frutas" THEN 1
    WHEN categoria = "Legumes" THEN 2
    WHEN categoria = "Tubérculos" THEN 3
    WHEN categoria = "Verduras" THEN 4
    ELSE 5
END;

UPDATE produtos
SET unidade_medida = CASE
    WHEN unidade_medida = "Unidade" THEN 1
    WHEN unidade_medida = "Kg" THEN 2
    WHEN unidade_medida = "Dúzia" THEN 3
    WHEN unidade_medida = "Caixa (10 Unidades)" THEN 4
    ELSE 8
END;

-- Agora trocando o tipo das colunas para comportar o tipo dos IDs, no caso, BIGINTs
ALTER TABLE produtos MODIFY categoria BIGINT NULL;
ALTER TABLE produtos MODIFY unidade_medida BIGINT NULL;
ALTER TABLE produtos MODIFY fabricante BIGINT NULL;
ALTER TABLE produtos MODIFY fornecedor BIGINT NULL;

-- Adicionando no nome das colunas a parte "_id" para identificar que o valor se refere ao ID da tabela auxiliar referente à coluna
ALTER TABLE produtos RENAME COLUMN unidade_medida TO unidade_medida_id;
ALTER TABLE produtos RENAME COLUMN categoria TO categoria_id;
ALTER TABLE produtos RENAME COLUMN fabricante TO fabricante_id;
ALTER TABLE produtos RENAME COLUMN fornecedor TO fornecedor_id;

-- Transformando as colunas de ID em chaves estrangeiras
ALTER TABLE produtos ADD CONSTRAINT fk_unidades_medida_id FOREIGN KEY (unidade_medida_id) REFERENCES unidades_medida (id);
ALTER TABLE produtos ADD CONSTRAINT fk_fornecedores_id FOREIGN KEY (fornecedor_id) REFERENCES fornecedores (id);
ALTER TABLE produtos ADD CONSTRAINT fk_fabricantes_id FOREIGN KEY (fabricante_id) REFERENCES fabricantes (id);
ALTER TABLE produtos ADD CONSTRAINT fk_categorias_id FOREIGN KEY (categoria_id) REFERENCES categorias (id);
