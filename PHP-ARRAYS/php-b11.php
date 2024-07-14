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

// Função que verifica se o codigo SKU escrito pelo usuario ja existe, ele só sai da função com um codigo SKU possivel
function verifica_key(array $estoque, string &$sku)
{
    $existe = false;
    foreach ($estoque as $array) {
        if ($sku == $array["sku"]) {
            $existe = true;
        }
    }
    return $existe;

}

// Função que adiciona produtos (1)
function adicionarProduto(&$estoque, string $sku, string $nome, string $unidade_medida, int $quantidade, float $preco) : void 
{

    // Adiciona o produto no estoque
    $estoque[] = [
        "sku" => $sku,
        "nome" => $nome,
        "unidade_medida" => $unidade_medida,
        "quantidade" => $quantidade,
        "preco" => $preco
    ]; 

    echo "O produto $nome de codigo SKU $sku foi adicionado." . PHP_EOL;

}

// Função que vende algum item (2)
function vende_item(array &$estoque, string $sku) : void
{

    $codigo = array_search($sku, array_column($estoque, "sku"));

    while (true) {

        $quantidade = trim(readline("Quantidade de {$estoque[$codigo]["nome"]} que voce vendeu: "));

        $produto = $estoque[$codigo]["nome"];
        $quantidade_velha = $estoque[$codigo]["quantidade"];

        // Para o caso do estoque ser esgotado
        if ($quantidade_velha - $quantidade == 0) {
            $estoque[$codigo]["quantidade"] = 0;
            echo "..." . PHP_EOL;            
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O produto " . $produto . ", de codigo SKU " . $sku . " foi esgotado, portanto foi zerado" . PHP_EOL;
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

function lista_item_especifico (array $array) : void 
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
function verifica_estoque (array $estoque, string $escolha) : void 
{
    // Variavel que guarda se o item existe ou não no estoque
    $existe = false;

    // Condição dependendo da escolha do usuario
    if ($escolha == "N" || $escolha == "n") {
        $nome = trim(ucwords(readline("Otimo!, qual é o nome do produto?: ")));

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

// Função auxiliar para o usort()
function ordena_alfabeticamente(array $nome1, array $nome2) : int 
{
    return $nome1["nome"] <=> $nome2["nome"];
}

// Função que lista os itens (4)
function lista_itens (array &$estoque) 
{

    // Ordena em ordem alfabetica e lista os produtos, mantendo o indice original
    uasort($estoque, "ordena_alfabeticamente");
    foreach ($estoque as $indice => $array_produto) {
        echo "$indice => ";
        foreach ($array_produto as $categoria => $info) {
            echo "$categoria: $info | ";
        }
        echo PHP_EOL;
    }

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
    echo "5. Atualizar o Estoque \n"; 
    echo "6. Quantidade de Itens no Estoque \n"; 
    echo "7. Deletar um produto do Estoque \n"; 
    echo "8. Sair \n";
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    $opcao = trim(readline("Digite a sua escolha: "));
    echo PHP_EOL;
    return $opcao;
}

// Função que exige que o usuario digite o tipo desejado para a variavel
function tipo_certo(&$categoria, string $nome_categoria, $tipo) : void
{
    if ($tipo == "string") {
        while (is_numeric($categoria)) {
            $categoria = trim(readline("$nome_categoria do produto deve estar em string ! Tente novamente: "));
        }
    }
    else {
        while (is_numeric($categoria) == false) {
            $categoria = trim(readline("$nome_categoria do produto deve estar em $tipo ! Tente novamente: "));
        }
        if ($tipo == "int") {
            $categoria = (int) $categoria;
        }
    }
}

// Função que atualiza a quantidade de um produto
function atualizar_produto(array &$estoque, string $sku, $quantidade) : void
{
    $codigo = array_search($sku, array_column($estoque, "sku"));

    $estoque[$codigo]["quantidade"] += $quantidade;
}

// Função que imprimi a quantidade de produtos e a soma dessas quantidade
function quantidade_produtos(array $estoque) : void
{
    $soma_quantidade = 0;

    foreach ($estoque as $produto) {
        $soma_quantidade += $produto["quantidade"];
    }

    $quantidade_de_produtos = count($estoque);

    echo "Há $quantidade_de_produtos produtos no estoque" . PHP_EOL;
    echo "A soma das quantidades de produtos totais é $soma_quantidade" . PHP_EOL;

}

// Função que deleta um item do estoque
function deletar_produto(array &$estoque, string $sku) : void 
{
    $codigo = array_search($sku, array_column($estoque, "sku"));

    $quantidade = $estoque[$codigo]["quantidade"];
    $nome = $estoque[$codigo]['nome'];

    if ($quantidade != 0) {
        $resposta = trim(readline("O produto $nome ainda tem o estoque de $quantidade, deseja mesmo deleta-lo? [S/N]: "));
    }
    else {
        $resposta = "S";
    }

    if (strtoupper($resposta)[0] == "S") {
        echo "O produto $nome foi deletado do estoque." . PHP_EOL;
        unset($estoque[$codigo]);
    }
}

while (true) {

    $opcao = exibirMenu();

    switch ($opcao) {
        case 1:
            $sku = trim(readline("Digite o Código SKU do produto: "));
            tipo_certo($sku, "O codigo SKU", "string");
            
            while (verifica_key($estoque, $sku) == true) {
                $sku = trim(readline("O codigo SKU $sku ja existe !!!, insira outro: "));                
                // O usuario tem que escreva um codigo SKU que não exista
            }
        
            $nome = trim(ucwords(readline("Digite o Nome do produto: ")));
            tipo_certo($nome, "O nome", "string");

            $unidade_medida = trim(ucwords(readline("Digite a Unidade de Medida: ")));
            tipo_certo($unidade_medida, "A unidade de medida", "string");

            $quantidade = trim(readline("Digite a Quantidade: "));
            tipo_certo($quantidade, "A quantidade", "int");

            $preco = trim(readline("Digite o preço do produto: "));
            tipo_certo($preco, "O preço", "float");

            adicionarProduto($estoque, $sku, $nome, $unidade_medida, $quantidade, $preco);
            break;
        case 2:
            $sku = trim(readline("Qual é o codigo SKU do produto que voce vendeu?: "));
            tipo_certo($sku, "O codigo SKU", "string");

            while (verifica_key($estoque, $sku) == false) {
                $sku = trim(readline("O codigo SKU $sku NÃO existe !!!, insira outro: "));                
                // O usuario tem que escrever um SKU valido para continuar
            }

            vende_item($estoque, $sku);
            break;
        case 3:
            $escolha = strtoupper(trim(readline("Gostaria de informar o nome ou codigo SKU do produto? [N/C]: ")))[0];
            tipo_certo($escolha, "Sua escolha ", "string");

            while ($escolha != "n" && $escolha != "N" && $escolha != "c" && $escolha != "C") {
                $escolha = strtoupper(trim(readline("Gostaria de informar o nome ou codigo SKU do produto? [N/C]: ")))[0];
                tipo_certo($escolha, "Sua escolha ", "string");
            }

            verifica_estoque($estoque, $escolha);
            break;
        case 4:
            lista_itens($estoque);
            break;
        case 5:
            $sku = trim(readline("Qual é o codigo SKU do produto que voce deseja atualizar?: "));
            tipo_certo($sku, "O codigo SKU", "string");

            while (verifica_key($estoque, $sku) == false) {
                $sku = trim(readline("O codigo SKU $sku NÃO existe !!!, insira outro: "));   
                tipo_certo($sku, "O codigo SKU", "string");
                // O usuario tem que escrever um SKU valido para continuar
            }

            $quantidade = trim(readline("Qual é a quantidade para acrescentar?: "));
            tipo_certo($quantidade, "A quantidade", "int");

            atualizar_produto($estoque, $sku, $quantidade);
            break;
        case 6:
            quantidade_produtos($estoque);
            break;
        case 7:
            $sku = trim(readline("Qual é o codigo SKU do produto que voce deseja deletar?: "));
            tipo_certo($sku, "O codigo SKU", "string");

            while (verifica_key($estoque, $sku) == false) {
                $sku = trim(readline("O codigo SKU $sku NÃO existe !!!, insira outro: "));                
                // O usuario tem que escrever um SKU valido para continuar
            }

            deletar_produto($estoque, $sku);
            break;
        case 8:
            echo "Saindo...\n";
            exit; // Sai do loop e encerra o script
        default:
            echo "Opção inválida, por favor tente novamente.\n";
            break;
    }
}
