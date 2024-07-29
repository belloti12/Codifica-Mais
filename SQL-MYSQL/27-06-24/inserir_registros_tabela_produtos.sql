
USE gestao_produtos;

INSERT INTO produtos (
nome,
sku,
descricao,
categoria,
preco,
unidade_medida,
peso,
quantidade_estoque,
fabricante,
fornecedor)
VALUES
(
'Maçã Gala', 'SKU001', 'Maçã Gala fresca', 'Frutas', 5.00, 'Kg', 1.00, 100, 'Agricultor A', 'Fornecedor A'),
(
'Banana Prata', 'SKU002', 'Banana Prata madura', 'Frutas', 3.00, 'Dúzia', 1.20, 80, 'Agricultor B', 'Fornecedor B'),
(
'Tomate Italiano', 'SKU003', 'Tomate Italiano fresco', 'Legumes', 7.00, 'Kg', 1.00, 60, 'Agricultor C', 'Fornecedor C'),
(
'Alface Americana', 'SKU004', 'Alface Americana orgânica', 'Verduras', 4.00, 'Unidade', 0.30, 50, 'Agricultor D', 'Fornecedor D'),
(
'Batata Doce', 'SKU005', 'Batata Doce fresca', 'Tubérculos', 6.00, 'Kg', 1.00, 70, 'Agricultor E', 'Fornecedor E'),
(
'Cenoura', 'SKU006', 'Cenoura orgânica', 'Legumes', 5.50, 'Kg', 1.00, 90, 'Agricultor F', 'Fornecedor F'),
(
'Laranja Lima', 'SKU007', 'Laranja Lima fresca', 'Frutas', 4.50, 'Kg', 1.00, 85, 'Agricultor G', 'Fornecedor G'),
(
'Pepino Japonês', 'SKU008', 'Pepino Japonês fresco', 'Legumes', 3.50, 'Kg', 1.00, 65, 'Agricultor H', 'Fornecedor H'),
(
'Pimentão Vermelho', 'SKU009', 'Pimentão Vermelho orgânico', 'Legumes', 8.00, 'Kg', 1.00, 55, 'Agricultor I', 'Fornecedor I'),
(
'Morango', 'SKU010', 'Morango fresco e orgânico', 'Frutas', 10.00, 'Caixa', 0.25, 40, 'Agricultor J', 'Fornecedor J');