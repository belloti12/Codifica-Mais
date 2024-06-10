<?php

/*
Exercício 1: Somar dois números
Descrição: Escreva um programa que solicite ao usuário dois números e imprima a soma deles.

INICIO
VARIAVEIS
	num1, num2, soma

num1 <- ESCREVA "Qual é o 1º numero?: "
num2 <- ESCREVA "Qual é o 2º numero?: "

soma <- num1 + num2

IMPRIMA soma

FIM

*/

$num_1 = readline("Digite o 1º numero: ");
$num_2 = readline("Digite o 2º numero: ");
$resultado = $num_1 + $num_2;

echo "$num_1 + $num_2 = $resultado";
