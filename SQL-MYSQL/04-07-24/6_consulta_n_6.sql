
SELECT a.id, a.nome, a.sku, a.descricao, a.preco, a.peso, a.quantidade_estoque, b.nome_fabricante FROM produtos a
INNER JOIN fabricantes b
ON a.fabricante_id = b.id
WHERE b.nome_fabricante = "Agricultor a"
