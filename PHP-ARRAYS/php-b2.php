<?php

$valor_conta = readline("Qual foi o valor da conta?: R$ ");
$gorjeta = readline("Quantos % de gorjeta?: ");

$valor_gorjeta = $valor_conta * $gorjeta / 100;
$valor_final = $valor_conta + $valor_gorjeta;

echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
echo "Valor da conta:         R$ $valor_conta" . PHP_EOL;
echo "Porcentagem da gorjeta: $gorjeta%" . PHP_EOL;
echo "Valor da gorjeta:       R$ $valor_gorjeta" . PHP_EOL;
echo "Valor total a ser pago: R$ $valor_final" . PHP_EOL;

