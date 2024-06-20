<?php

$estoque = [
    1 => ["Nome" => "Polo", "Tamanho" => "P", "Cor" => "Amarelo", "Quantidade" => "33"], 
    2 => ["Nome" => "Polo 2", "Tamanho" => "M", "Cor" => "Azul", "Quantidade" => "22"]
];


// Função que verifica o codigo escolhido pelo usuario
function verifica_key(array $estoque, &$codigo) 
{
    // O loop percorre o estoque, pegando o codigo de cada produto 
    foreach ($estoque as $key => $array) {
        // Se o codigo do usuario for igual ao codigo do produto, a função pede outro codigo
        if ($codigo == $key) {
            $codigo = readline("O codigo $codigo ja existe !!!, insira outro: ");
            // Caso o usuario escreva outro codigo ja existente, a função é chamada novamente
            verifica_key($estoque, $codigo);
        }
    }
}

// Função que adiciona produtos (1)
function adicionarProduto(&$estoque, $codigo, $nome, $tamanho, $cor, $quantidade) 
{

    // Função que verifica se o codigo escrito pelo usuario ja existe, ele só sai da função com um codigo possivel
    verifica_key($estoque, $codigo);

    // Adiciona o produto no estoque
    $estoque["$codigo"] = [
        // O ucwords só padroniza para Title Case
        "Nome" => ucwords($nome),
        "Tamanho" => ucwords($tamanho),
        "Cor" => ucwords($cor),
        "Quantidade" => $quantidade
    ]; 
}

// Função que vende algum item (2)
function vende_item(array &$estoque, $codigo, $quantidade)
{
    while (true) {
        $produto = $estoque[$codigo]["Nome"];
        $quantidade_velha = $estoque[$codigo]["Quantidade"];
        
        // Para o caso do estoque ser esgotado
        if ($quantidade_velha - $quantidade == 0) {
            unset($estoque[$codigo]);
            echo "..." . PHP_EOL;            
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O produto " . $produto . ", de codigo " . $codigo . " foi esgotado, portanto foi removido do estoque" . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            break;
        }

        // Quantidades negativas não existem
        elseif ($quantidade_velha - $quantidade < 0) {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "Voce vendeu mais produtos do que o estoque!, só existem $quantidade_velha no estoque!" . PHP_EOL;
            echo "Tente novamente!!!" . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            continue;
        }

        // Se a quantidade for possivel e diferente de 0
        else {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O estoque do $produto foi atualizada de $quantidade_velha para " . $quantidade_velha - $quantidade . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            $estoque[$codigo]["Quantidade"] = $quantidade_velha - $quantidade;
            break;
        }
    }
}

function lista_item_especifico ($chave, $array) 
{
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;  
    
    echo $chave . " -> ";                

    // Percorre o estoque inteiro, e imprimi o codigo de cada produto
    foreach ($array as $key => $item) {
            echo $key . ": " . $item . " | ";
        }         
        echo PHP_EOL;

    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
}

// Função que verifica o estoque (3)
function verifica_estoque (array $estoque, $escolha) 
{
    // Variavel que guarda se o item existe ou não no estoque
    $existe = false;

    // Condição dependendo da escolha do usuario
    if ($escolha == "N" || $escolha == "n") {
        $nome = ucwords(readline("Otimo!, qual é o nome do produto?: "));

        // Loop que percorre o estoque inteiro, comparando o nome informado pelo usuario com o nome dos produtos
        foreach ($estoque as $chave => $array) {
            if ($nome == $array["Nome"]) {
                echo "O produto $nome consta no estoque!. Informações sobre: " . PHP_EOL;

                // Função papra listar as informações do produto
                lista_item_especifico($chave, $array);

                $existe = true;
            }
        }
        if ($existe == false) {
            echo "$nome não consta no estoque!!!";
        }
    }
    // O else funciona de forma parecida, mas agora com o codigo do produto
    else {
        $codigo = readline("Otimo!, qual é o codigo do produto?: ");
    
        foreach ($estoque as $key => $array) {
            if ($codigo == $key) {
                echo "O produto {$estoque[$codigo]["Nome"]} de codigo $codigo consta no estoque!. Informações sobre: " . PHP_EOL;
    
                lista_item_especifico($key, $array);

                $existe = true;   

            }
        }

        if ($existe == false) {
            echo "O produto de codigo $codigo não consta no estoque!!!";
        }
    }
}


// Função que lista os itens (4)
function lista_itens (array &$estoque) 
{
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    // Percorre o estoque inteiro, e imprimi o codigo de cada produto
    foreach ($estoque as $codigo => $array) {
        echo $codigo . " -> ";
        // Percorre o array de cada produto, imprimindo cada categoria e valor da categoria
        foreach ($array as $key => $item) {
            echo $key . ": " . $item . " | ";
        }         
        echo PHP_EOL;

    }
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;            
}

// Função para exibir o menu e obter a escolha do usuário
function exibirMenu()
{
    echo PHP_EOL;
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-= Menu =-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    echo "Escolha uma das opções abaixo:\n";
    echo "1. Adicionar um produto \n";
    echo "2. Vender um produto \n";
    echo "3. Verificar Estoque \n";
    echo "4. Listar o Estoque \n";
    echo "5. Sair \n";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    $opcao = readline("Digite a sua escolha: ");
    echo PHP_EOL;
    return $opcao;
}

while (true) {

    $opcao = exibirMenu();

    switch ($opcao) {
        case 1:
            $codigo = readline("Digite o Código do produto: ");
            $nome = readline("Digite o Nome do produto: ");
            $tamanho = readline("Digite o Tamanho: ");
            $cor = readline("Digite a Cor: ");
            $quantidade = readline("Digite a Quantidade: ");
            adicionarProduto($estoque, $codigo, $nome, $tamanho, $cor, $quantidade);
            break;
        case 2:

            $codigo = readline("Qual é o codigo do produto que voce vendeu?: ");
            $quantidade = readline("Quantidade de {$estoque[$codigo]["Nome"]} voce vendeu: ");
            
            vende_item($estoque, $codigo, $quantidade);

            break;
        case 3:

            $escolha = readline("Gostaria de informar o nome ou codigo do produto? [N/C]: ");

            while ($escolha != "n" || $escolha != "N" || $escolha != "c" || $escolha != "C") {
                $escolha = readline("Gostaria de informar o nome ou codigo do produto? [N/C]: ");
            }

            verifica_estoque($estoque, $escolha);

            break;
        case 4:

            lista_itens($estoque);

            break;
        case 5:
            echo "Saindo...\n";
            exit; // Sai do loop e encerra o script
        default:
            echo "Opção inválida, por favor tente novamente.\n";
            break;
    }
}
