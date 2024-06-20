<?php

// Lista de itens e valores (adicionei alguns para teste)
$itens = [
    "Carne", 
    "Linguiça", 
    "Frango", 
    "Coração de Frango", 
    "Pão de Alho", 
    "Queijo Coalho", 
    "Salada", 
    "Farofa", 
    "Vinagrete", 
    "Bebidas"
];
$valores = [100, 50, 100, 30, 35, 20, 10, 10, 10, 100];

$total_participantes = readline("Quantas pessoas foram no churrasco?: ");
echo PHP_EOL;

// Calcula a soma de todos os valores
$valor_total = 0;
foreach ($valores as $valor) {
    $valor_total += $valor;
}

function dividindo_valor ($valores, $total) 
{
    return $valores / $total;
}

echo "Cada pessoa deve contribuir com R$ " . dividindo_valor($valor_total, $total_participantes) . PHP_EOL;
echo PHP_EOL;

// O valor da variavel do maior valor pode ser qualquer elemento da lista, ja que o loop vai analisar todos eles
$maior_valor = $valores[0];
foreach ($valores as $valor) {
    if ($valor > $maior_valor) {
        $maior_valor = $valor;
    }
}

// Com o maior valor calculado, podemos achar os itens que esse valor corresponde. A variavel é um array para que
// No caso de itens de mesmo valor, nenhum deles seja desconsiderado
$item_caro = [];
foreach ($valores as $indice => $valor) {
    if ($valor == $maior_valor) {
        $item_caro[] = $itens[$indice];
    }
}

// Se apenas um item for o mais caro, então o programa exibi apenas o item isolado da lista
if (count($item_caro) == 1) {
    echo "O item mais caro do churrasco foi {$item_caro[0]} por R$ $maior_valor";
}
// Caso seja mais de um item, então ele imprimi todos eles
else {
    echo "Os item mais caros do churrasco foram ";
    foreach ($item_caro as $caro) {
        // Condição para que o ultimo dos itens não seja escrito com uma virgula no final (questão estética)
        if ($caro == $item_caro[count($item_caro) - 1]) {
            echo "$caro";
        }
        else {
            echo "$caro, ";
        }
    }
    echo " por R$ $maior_valor cada" . PHP_EOL;
}

echo PHP_EOL;
if ($total_participantes <= 1) {
    echo "=-x-=-x-=-=-x-=-x-=-=-x-=-x-=-=-x-=-x-=-=-x-=-x-=" . PHP_EOL;
    echo "O churrasco foi cancelado, todo mundo furou!" . PHP_EOL;
    echo "=-x-=-x-=-=-x-=-x-=-=-x-=-x-=-=-x-=-x-=-=-x-=-x-=" . PHP_EOL;
    echo PHP_EOL;
}
