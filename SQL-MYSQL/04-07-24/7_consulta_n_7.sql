
SELECT a.id, a.nome, a.sku, a.descricao, b.nome_categoria, a.preco, c.nome_unidade_medida, a.peso, a.quantidade_estoque FROM produtos a
INNER JOIN categorias b
ON a.categoria_id = b.id
INNER JOIN unidades_medida c
ON a.unidade_medida_id = c.id
WHERE b.nome_categoria = "Frutas" AND c.nome_unidade_medida != "Kg"
