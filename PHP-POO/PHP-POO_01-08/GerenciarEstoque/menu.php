<?php

require_once "autoload.php";

function exibirMenu() : string
{
    echo PHP_EOL;
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-= Menu =-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    echo "Escolha uma das opções abaixo:\n";
    echo "1. Adicionar um produto \n";
    echo "2. Vender um produto \n";
    echo "3. Verificar Estoque \n";
    echo "4. Listar o Estoque \n";
    echo "5. Atualizar o Estoque \n"; 
    echo "6. Quantidade de Itens no Estoque \n"; 
    echo "7. Deletar um produto do Estoque \n"; 
    echo "8. Sair \n";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    $opcao = trim(readline("Digite a sua escolha: "));
    echo PHP_EOL;
    return $opcao;
}

$estoque = new Estoque();


while (true) {

    $decisao = exibirMenu();

    switch ($decisao) {
        case 1:
            // As verificações desse while só são necessários se for preciso executar um método pelo terminal (é o caso desse arquivo)
            // Como dito antes as verificações são mais importantes nos itens de string
            $sku = trim(readline("Qual é o código SKU do produto?: "));
            $nome = trim(readline("Qual é o nome do produto?: ")); 
            $unidadeMedida = trim(readline("Qual é a unidade de medida do produto?: ")); 
            // Verificações nos itens numéricos pra não dar erro no terminal
            $quantidade = trim(readline("Qual é a quantidade do produto?: ")); 
            $quantidade = VerificaTipo::verificarTipo($quantidade, "int", "quantidade");
            $preco = trim(readline("Qual é o preço do produto?: "));
            $preco = VerificaTipo::verificarTipo($preco, "float", "preco");

            $novoProduto = new Produto($sku, $nome, $unidadeMedida, $quantidade, $preco);
            $estoque->adicionarProduto($novoProduto);
            
            break;
        case 2:
            $sku = trim(readline("Qual é o código SKU do produto?: "));
            $sku = VerificaTipo::verificarTipo($sku, "string", "SKU");
            $quantidadeVendida = trim(readline("Vendeu quantos produtos?: "));
            $quantidadeVendida = VerificaTipo::verificarTipo($quantidadeVendida, "int", "quantidade");

            $estoque->venderProduto($sku, $quantidadeVendida);
            
            break;
        case 3:
            $sku = trim(readline("Qual é o código SKU do produto?: ")); 
            $sku = VerificaTipo::verificarTipo($sku, "string", "SKU");

            $estoque->listarItemEspecifico($sku);

            break;
        case 4:
            $estoque->listarEstoque();

            break;
        case 5:
            $sku = trim(readline("Qual é o código SKU do produto?: ")); 
            $sku = VerificaTipo::verificarTipo($sku, "string", "SKU");
            $quantidadeNova = trim(readline("Qual é a quantiade nova?: "));
            $quantidadeNova = VerificaTipo::verificarTipo($quantidadeNova, "int", "quantidade");

            $estoque->atualizarProduto($sku, $quantidadeNova);

            break;
        case 6:
            $estoque->informarQuantidades();
            
            break;
        case 7:
            $sku = trim(readline("Qual é o código SKU do produto?: ")); 
            $sku = VerificaTipo::verificarTipo($sku, "string", "SKU");

            $estoque->deletarProduto($sku);

            break;
        case 8:
            echo "Saindo..." . PHP_EOL;
            exit();
    }
}
