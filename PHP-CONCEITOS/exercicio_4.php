<?php

/*

Exercício 4: Contagem regressiva
Descrição: Elabore um programa que faça uma contagem regressiva de 10 até 1 e depois mostre
uma mensagem "Fogo!".

INICIO 

PARA contagem DE 1 ATE 10 PASSO -1 FACA
	IMPRIMA contagem
FIMPARA

IMPRIMA "Fogo!"

FIM

*/

for ($i = 10; $i >= 1; $i -= 1) {
	echo "$i..." . PHP_EOL;
}
echo "Fogo!";
