<?php

/*

Exercício 7: Tabela de Multiplicação
Descrição: Faça um programa que imprime a tabela de multiplicação de 1 até 10 para um número
fornecido pelo usuário.

INICIO
VARIAVEIS
	num

num <- ESCREVA "Digite um numero: "

PARA contagem DE 1 ATE 10 FACA
	IMPRIMA num * contagem
FIMPARA

FIM

*/

$num = readline("Digite um numero: ");

for ($i = 1; $i <= 10; $i += 1) {
	$resultado = $i * $num;
    echo "$i x $num = $resultado" . PHP_EOL;
}
