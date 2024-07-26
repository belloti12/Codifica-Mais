
USE gestao_produtos;

UPDATE produtos SET categoria = "Frutas" WHERE id = 3;

UPDATE produtos SET quantidade_estoque = 40 WHERE id = 6;

UPDATE produtos SET nome = "Pepino", descricao = "Pepino fresco" WHERE id = 8;

UPDATE produtos SET nome = "Alface Americano", descricao = "Alface Americano fresco" WHERE id = 4;

UPDATE produtos SET unidade_medida = "Caixa (10 Unidades)" WHERE id = 10;
