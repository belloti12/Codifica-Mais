<?php

/*

Exercício 5: Par ou ímpar
Descrição: Desenvolva um programa que leia um número e informe se ele é par ou ímpar.

INICIO
VARIAVEIS
	num

num <- ESCREVA "Digite um numero: "

SE num % 2 === 0 FACA
	IMPRIMA "O numero é PAR"
SENAO
	IMPRIMA "O numero é IMPAR"
FIMSE

FIM

*/

$num = readline("Digite um numero: ");

if ($num % 2 == 0) {
	echo "O numero $num é PAR";
}
else {
	echo "O numero $num é IMPAR";
}
