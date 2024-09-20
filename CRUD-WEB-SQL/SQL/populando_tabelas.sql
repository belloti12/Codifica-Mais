USE db_estoque;

-- Populando tabela de categorias
INSERT INTO tb_categorias (nome, cor) VALUES
('Eletrônicos', '#f8f877'),
('Eletrodomésticos', 'lightcoral'),
('Móveis', '#C4A484'),
('Decoração', 'lightgreen'),
('Vestuário', 'lightblue'),
('Outros', 'lightgrey');

-- Populando tabela de Unidades de Medida
INSERT INTO tb_unidades_medida (nome) VALUES
('Un'),
('Kg'),
('g'),
('L'),
('mm'),
('cm'),
('m'),
('m²');

-- Populando tabela de Produtos
INSERT INTO tb_produtos (nome, sku, unidade_medida_id, valor, quantidade, categoria_id) VALUES
('Camisa CODIFICA+', '123456', 1, 123, 10, 1),
('Geladeira', '654321', 1, 2500.00, 5, 2),
('Televisão', '112233', 1, 1800.00, 7, 1),
('Sofá', '445566', 1, 1200.00, 3, 3),
('Mesa de Jantar', '778899', 1, 800.00, 2, 3),
('Cadeira', '998877', 1, 150.00, 12, 3),
('Camiseta', '334455', 1, 50.00, 20, 5),
('Jeans', '665544', 1, 120.00, 15, 5),
('Micro-ondas', '889900', 1, 350.00, 8, 2),
('Liquidificador', '776655', 1, 120.00, 10, 2),
('Quadro Decorativo', '443322', 1, 200.00, 5, 4),
('Luminária', '556677', 1, 80.00, 10, 4),
('Tapete', '990011', 8, 350.00, 7, 4),
('Aspirador de Pó', '554433', 1, 400.00, 4, 2),
('Impressora', '223344', 1, 600.00, 6, 1),
('Cama de Casal', '887766', 1, 2200.00, 2, 3),
('Colchão', '009988', 1, 1200.00, 3, 3),
('Blusa de Moletom', '667788', 1, 90.00, 18, 5),
('Vestido', '331122', 1, 150.00, 12, 5),
('Sapato', '776600', 1, 200.00, 10, 5),
('Relógio de Pulso', '445599', 1, 300.00, 9, 1),
('Smartwatch', '990044', 1, 900.00, 6, 1),
('Fogão', '112211', 1, 1200.00, 4, 2),
('Forno Elétrico', '668899', 1, 800.00, 5, 2),
('Cortina', '223355', 1, 150.00, 8, 4),
('Ventilador', '776688', 1, 200.00, 9, 2),
('Ar-condicionado', '665522', 1, 2200.00, 3, 2),
('Gaveteiro', '556611', 1, 350.00, 7, 3),
('Estante', '331188', 1, 500.00, 5, 3),
('Roupão de Banho', '887722', 1, 180.00, 8, 5);
