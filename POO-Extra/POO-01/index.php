<?php

use Classes\{Circulo, Forma, Retangulo};

require_once "autoload.php";

$retangulo_1 = new Retangulo(12, 10);
echo $retangulo_1->calcularPerimetro() . PHP_EOL;
echo $retangulo_1->calcularArea() . PHP_EOL;
echo $retangulo_1->info() . PHP_EOL;

$retangulo_2 = new Retangulo(12.34, 56.78);
echo $retangulo_2->calcularPerimetro() . PHP_EOL;
echo $retangulo_2->calcularArea() . PHP_EOL;
echo $retangulo_2->info() . PHP_EOL;

$circulo_1 = new Circulo(1);
echo $circulo_1->calcularPerimetro() . PHP_EOL;
echo $circulo_1->calcularArea() . PHP_EOL;
echo $circulo_1->info() . PHP_EOL;

$circulo_2 = new Circulo(3.14);
echo $circulo_2->calcularPerimetro() . PHP_EOL;
echo $circulo_2->calcularArea() . PHP_EOL;
echo $circulo_2->info() . PHP_EOL;

