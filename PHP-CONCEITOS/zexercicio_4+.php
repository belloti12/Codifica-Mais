<?php

/*

Escreva um script PHP que solicita ao usuário uma série de números inteiros
até que ele digite um valor específico (por exemplo, -1) para parar a entrada.
O script deve então determinar e exibir o maior e o menor número digitado
pelo usuário.

*/

$menor = $maior = 0;
$i = 1;

while (true) {
    $num = readline("Digite o $i º valor [-1 para parar]: ");

    if ($num == -1) {
        break;
    }

    if ($i == 1) {
        $menor = $num;
        $maior = $num;
    }

    if ($num > $maior) {
        $maior = $num;
    }

    if ($num < $menor) {
        $menor = $num;
    }

    $i += 1;
}

echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
echo "O maior numero digitado foi $maior" . PHP_EOL;
echo "O menor numero digitado foi $menor" . PHP_EOL;
