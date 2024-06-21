<?php

$estoque = [
    [
    'sku' => 'GRA-001',
    'nome' => 'Arroz 5kg',
    'unidade_medida' => '5kg',
    'quantidade' => 50,
    'preco' => 37.95
    ],
    [
    'sku' => 'GRA-002',
    'nome' => 'Feijão Preto 1kg',
    'unidade_medida' => '1kg',
    'quantidade' => 30,
    'preco' => 8.99
    ],
    [
    'sku' => 'MAS-003',
    'nome' => 'Macarrão Espaguete 500g',
    'unidade_medida' => '500g',
    'quantidade' => 100,
    'preco' => 9.99
    ],
    [
    'sku' => 'MAN-004',
    'nome' => 'Óleo De Soja 900ml',
    'unidade_medida' => '900ml',
    'quantidade' => 60,
    'preco' => 6.98
    ],
    [
    'sku' => 'GRA-005',
    'nome' => 'Açúcar Refinado 1kg',
    'unidade_medida' => '1kg',
    'quantidade' => 80,
    'preco' => 4.98
    ],
    [
    'sku' => 'GRA-006',
    'nome' => 'Sal Refinado 1kg',
    'unidade_medida' => '1kg',
    'quantidade' => 40,
    'preco' => 4.5
    ],
    [
    'sku' => 'GRA-007',
    'nome' => 'Café Torrado E Moído 500g',
    'unidade_medida' => '500g',
    'quantidade' => 20,
    'preco' => 16.98
    ],
    [
    'sku' => 'BEB-008',
    'nome' => 'Leite UHT Integral 1L',
    'unidade_medida' => '1L',
    'quantidade' => 70,
    'preco' => 6.99
    ],
    [
    'sku' => 'GRA-009',
    'nome' => 'Farinha De Trigo 1kg',
    'unidade_medida' => '1kg',
    'quantidade' => 90,
    'preco' => 5.45
    ],
    [
    'sku' => 'PRO-010',
    'nome' => 'Molho De Tomate',
    'unidade_medida' => '340g',
    'quantidade' => 50,
    'preco' => 3.99
    ]
];

// Função que verifica o codigo SKU escolhido pelo usuario
function verifica_key(array $estoque, &$sku) 
{

    foreach ($estoque as $array) {
        // Se o codigo do usuario for igual ao codigo SKU do produto, a função pede outro codigo SKU
        if ($sku == $array["sku"]) {
            $sku = readline("O codigo SKU $sku ja existe !!!, insira outro: ");
            // Caso o usuario escreva outro codigo ja existente, a função é chamada novamente
            verifica_key($estoque, $sku);
        }
    }
}

// Função que adiciona produtos (1)
function adicionarProduto(&$estoque, $sku, $nome, $unidade_medida, $quantidade, $preco) 
{

    // Função que verifica se o codigo SKU escrito pelo usuario ja existe, ele só sai da função com um codigo SKU possivel
    verifica_key($estoque, $sku);

    // Adiciona o produto no estoque
    $estoque[] = [
        // O ucwords só padroniza para Title Case
        "sku" => ucwords($sku),
        "nome" => ucwords($nome),
        "unidade_medida" => $unidade_medida,
        "quantidade" => $quantidade,
        "preco" => $preco
    ]; 
}

// Função que vende algum item (2)
function vende_item(array &$estoque, $codigo, $sku)
{
    while (true) {

        $quantidade = readline("Quantidade de {$estoque[$codigo]["nome"]} que voce vendeu: ");

        $produto = $estoque[$codigo]["nome"];
        $quantidade_velha = $estoque[$codigo]["quantidade"];

        // Para o caso do estoque ser esgotado
        if ($quantidade_velha - $quantidade == 0) {
            unset($estoque[$codigo]);
            echo "..." . PHP_EOL;            
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O produto " . $produto . ", de codigo SKU " . $sku . " foi esgotado, portanto foi removido do estoque" . PHP_EOL;
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
            $estoque[$codigo]["quantidade"] = $quantidade_velha - $quantidade;
            break;
        }
    }
}

function lista_item_especifico ($array) 
{
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;         

    // Percorre o estoque inteiro, e imprimi as informações de cada produto
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
        foreach ($estoque as $array) {
            if ($nome == $array["nome"]) {
                echo "O produto $nome consta no estoque!. Informações sobre: " . PHP_EOL;

                // Função para listar as informações do produto
                lista_item_especifico($array);

                $existe = true;
            }
        }
        if ($existe == false) {
            echo "$nome não consta no estoque!!!";
        }
    }
    // O else funciona de forma parecida, mas agora com o codigo SKU do produto
    else {
        $sku = readline("Otimo!, qual é o codigo SKU do produto?: ");
    
        foreach ($estoque as $array) {
            if ($sku == $array["sku"]) {
                echo "O produto {$array["nome"]} de codigo SKU {$array["sku"]} consta no estoque!. Informações sobre: " . PHP_EOL;
    
                lista_item_especifico($array);

                $existe = true;   

            }
        }

        if ($existe == false) {
            echo "O produto de codigo SKU $sku não consta no estoque!!!";
        }
    }
}

// Função que lista os itens (4)
function lista_itens (array &$estoque) 
{

    // Cria um array auxiliar, a key de cada elemento é seu nome e o valor é o array que o nome esta presente
    $array_auxiliar = [];

    foreach ($estoque as $array) {
        $array_auxiliar[$array["nome"]] = $array;
    }

    // Organiza a lista em ordem alfabetica, considerando a key dos elementos
    ksort($array_auxiliar);

    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    
    foreach ($array_auxiliar as $array) {
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
            $sku = readline("Digite o Código SKU do produto: ");
            verifica_key($estoque, $sku);
            $nome = readline("Digite o Nome do produto: ");
            $unidade_medida = readline("Digite a Unidade de Medida: ");
            $quantidade = readline("Digite a Quantidade: ");
            $preco = readline("Digite o preço do produto: ");
            adicionarProduto($estoque, $sku, $nome, $unidade_medida, $quantidade, $preco);
            break;
        case 2:
            $sku = readline("Qual é o codigo SKU do produto que voce vendeu?: ");

            $codigo = array_search($sku, array_column($estoque, "sku"));

            vende_item($estoque, $codigo, $sku);

            break;
        case 3:

            $escolha = readline("Gostaria de informar o nome ou codigo SKU do produto? [N/C]: ");

            while ($escolha != "n" && $escolha != "N" && $escolha != "c" && $escolha != "C") {
                $escolha = readline("Gostaria de informar o nome ou codigo SKU do produto? [N/C]: ");
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
