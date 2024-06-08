<?php

/*

Exercício 9: Checando Primos
Descrição: Escreva um programa que recebe um número e verifica se ele é um número primo ou
não.

INICIO
VARIAVEIS
	num, divisores

num <- ESCREVA "Digite um numero: "

PARA numeros DE 1 ATE (num + 1) FACA
	SE num % numeros === 1
		divisores += 1
	FIMSE
FIMPARA

SE divisores > 2 ENTAO
	IMPRIMA "O numero NÃO É PRIMO"
SENAO
	IMPRIMA "O numero É PRIMO"

FIM

*/

$num = readline("Digite o numero: ");
$divisores = 0;

for ($i = 1; $i <= $num; $i += 1) {
	if ($num % $i == 0) {
		$divisores += 1;
	}
}

if ($divisores > 2) {
	echo "O número $num NÃO é primo";
}
else {
	echo "O número $num é PRIMO";
}
