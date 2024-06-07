<?php

$estoque = [
    1 => ["Nome" => "Polo", "Tamanho" => "P", "Cor" => "Amarelo", "Quantidade" => "33"], 
    2 => ["Nome" => "Polo 2", "Tamanho" => "M", "Cor" => "Azul", "Quantidade" => "22"]
];

// Implemente aqui o código

function adicionarProduto(&$estoque, $codigo, $nome, $tamanho, $cor, $quantidade) {

}

// Função para exibir o menu e obter a escolha do usuário
function exibirMenu()
{
    echo "\n";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-= Menu =-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    echo "Escolha uma das opções abaixo:\n";
    echo "1. Adicionar um produto 1\n";
    echo "2. Vender um produto 2\n";
    echo "3. Verificar Estoque 3\n";
    echo "4. Listar o Estoque 4\n";
    echo "5. Sair\n";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    $opcao = readline("Digite a sua escolha: ");
    return $opcao;
}

while (true) {

    $opcao = exibirMenu();

    switch ($opcao) {
        case 1:
            echo "Adicionar um produto\n";
            $codigo = readline("Digite o Código do produto: ");
            $nome = readline("Digite o Nome do produto: ");
            $tamanho = readline("Digite o Tamanho: ");
            $cor = readline("Digite a Cor: ");
            $quantidade = readline("Digite a Quantidade: ");
            adicionarProduto($estoque, $codigo, $nome, $tamanho, $cor, $quantidade);
            break;
        case 2:
            while (true) {
                $codigo = readline("Qual é o codigo do produto que voce vendeu?: ");
                $produto = $estoque[$codigo]["Nome"];
                $quantidade = readline("Quantas $produto voce vendeu?: ");
                $quantidade_velha = $estoque[$codigo]["Quantidade"];
                
                if ($quantidade_velha - $quantidade == 0) {
                    unset($estoque[$codigo]);
                    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
                    echo "..." . PHP_EOL;
                    echo "O produto " . $produto . ", de codigo " . $codigo . " foi esgotado, portanto foi removido do estoque" . PHP_EOL;
                    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
                    break;
                }

                elseif ($quantidade_velha - $quantidade < 0) {
                    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
                    echo "Voce vendeu mais produtos do que o estoque!, só existem $quantidade_velha no estoque!" . PHP_EOL;
                    echo "Tente novamente!!!" . PHP_EOL;
                    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
                    continue;
                }

                else {
                    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
                    echo "O estoque do $produto foi atualizada de $quantidade_velha para " . $quantidade_velha - $quantidade . PHP_EOL;
                    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
                    $estoque[$codigo]["Quantidade"] = $quantidade_velha - $quantidade;
                    break;
                }
            }

            // Implemente aqui o código para a opção 2

            break;
        case 3:
            echo "Verificar Estoque\n";
            // Implemente aqui o código para a opção 3
            break;
        case 4:
            echo "Listar o Estoque\n";
            // Implemente aqui o código para a opção 4
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            foreach ($estoque as $codigo => $array) {
                echo $codigo . " -> ";
                foreach ($array as $key => $item) {
                    echo $key . ": " . $item . " | ";
                }         
                echo PHP_EOL;

            }
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;            



            break;
        case 5:
            echo "Saindo...\n";
            exit; // Sai do loop e encerra o script
        default:
            echo "Opção inválida, por favor tente novamente.\n";
            break;
    }
}
