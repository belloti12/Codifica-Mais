<?php

/*

Escreva um código PHP que solicita ao usuário dois números inteiros, a e b,
e calcula a soma de todos os números ímpares no intervalo [a, b] (inclusive).
Certifique-se de que a seja menor ou igual a b. Se a for maior que b, solicite
ao usuário que insira novamente os valores.

*/

$a = readline("Digite o 1º numero: ");
$b = readline("Digite o 2º numero: ");

if ($a > $b) {
    echo "Certifique que o 1º valor seja menor que o 2º valor!!!" . PHP_EOL;
    $a = readline("Digite o 1º numero: ");
    $b = readline("Digite o 2º numero: ");
}

$soma_impares = 0;

for ($i = $a; $i <= $b; $i += 1) {
    if ($i % 2 == 1) {
        $soma_impares += $i;
    }
}

echo "A soma dos impares entre $a e $b é igual a $soma_impares";
