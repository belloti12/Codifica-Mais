<?php

$largura = readline("Qual é a largura do retângulo? [m]: ");
$altura = readline("Qual é a altura do retângulo? [m]: ");

$area = $largura * $altura;
$perimetro = 2 * ($largura + $altura);

echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
echo "Largura:   $largura m" . PHP_EOL;
echo "Altura:    $altura m" . PHP_EOL;
echo "Área:      $area m²" . PHP_EOL;
echo "Perímetro: $perimetro m" . PHP_EOL;

