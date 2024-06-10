<?php

/*

Exercício 3: Verificar maioridade
Descrição: Crie um programa que pergunte a idade do usuário e diga se ele é maior de idade (18
anos ou mais) ou não.

INICIO
VARIAVEIS
	idade

idade <- ESCREVA "Digite sua idade: "

SE idade >= 18 ENTAO
	IMPRIMA "É maior de idade"
SENAO
	IMPRIMA "Não é maior de idade"
FIMSE

FIM

*/

$idade = readline("Quantos anos você tem?: ");

while ($idade <= 0) {
	echo "Ter $idade anos é impossível!, tente novamente" . PHP_EOL;
	$idade = readline("Quantos anos você tem?: ");
}

if ($idade >= 18) {
	echo "Como você tem $idade anos, ja é maior de 18 anos e possui maioridade";
}
else {
	echo "Você tem $idade anos, ainda não atingiu a maioridade de 18 anos";
}
