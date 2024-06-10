<?php

/*

Exercício 2: Calcular média de notas
Descrição: Faça um programa que leia três notas de um aluno, calcule e mostre a média aritmética das notas.

INICIO
VARIAVEIS
	nota1, nota2, nota3, media

nota1 <- ESCREVA "Qual é a 1ª nota?: "
nota2 <- ESCREVA "Qual é a 2ª nota?: "
nota3 <- ESCREVA "Qual é a 3ª nota?: "

media <- (nota1 + nota2 + nota3) / 3

IMPRIMA media

FIM

*/

$nota_1 = readline("Digite a 1ª nota: ");
$nota_2 = readline("Digite a 2ª nota: ");
$nota_3 = readline("Digite a 3ª nota: ");

$media = ($nota_1 + $nota_2 + $nota_3) / 3;

echo "A média das três notas é $media";
