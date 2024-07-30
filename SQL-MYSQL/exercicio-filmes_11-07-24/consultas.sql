
-- Consulta 1
SELECT titulo_original, avaliacao FROM filmes
ORDER BY avaliacao DESC;

-- Consulta 2
SELECT * FROM filmes
ORDER BY duracao DESC
LIMIT 1;

-- Consulta 3
SELECT titulo, duracao, restricao_de_idade FROM filmes
WHERE restricao_de_idade <= 16
ORDER BY duracao ASC
LIMIT 3;

-- Consulta 4
SELECT * FROM filmes
ORDER BY ano_de_lancamento ASC, avaliacao DESC;

-- Consulta 5
SELECT * FROM filmes
WHERE categorias  LIKE "%Drama%";

-- Consulta 6
SELECT COUNT(*) AS total_de_registros FROM filmes;

-- Consulta 7
SELECT restricao_de_idade, COUNT(restricao_de_idade) AS quantidade_de_filmes FROM filmes
GROUP BY restricao_de_idade
ORDER BY restricao_de_idade ASC;

-- Consulta 8
SELECT restricao_de_idade, COUNT(restricao_de_idade) AS quantidade_de_filmes, SUM(duracao) AS soma_das_duracoes_dos_filmes, AVG(avaliacao) AS avaliacao_media FROM filmes
GROUP BY restricao_de_idade
ORDER BY restricao_de_idade ASC;
