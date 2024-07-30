
SELECT b.nome_fornecedor, COUNT(*) AS quantidade_de_produtos FROM produtos a
INNER JOIN fornecedores b
ON a.fornecedor_id = b.id
WHERE b.nome_fornecedor = "Fornecedor A"
