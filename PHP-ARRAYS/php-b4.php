<?php

$temperatura = readline("Qual é a temperatura?: ");
$unidade = readline("Qual é a unidade [°C / °F]: ");

// Um while para garantir que as unidades serão informadas de forma correta
while ($unidade != "°C" && $unidade != "°c" && $unidade != "°F" && $unidade != "°f") {
    echo "!!!, verifique se a unidade esta escrita corretamente!" . PHP_EOL;
    $unidade = readline("Qual é a unidade [°C / °F]: ");  
}

// Se a unidade informada for em Celsius, o programa calcula a mesma temperatura em Fahrenheit e exibi as temperaturas
// Caso não seja em Celsius, a temperatura informada esta em Fahrenheit e o programa executa a mesma ideia da de cima
if ($unidade == "°C" || $unidade == "°c") {
    $temperatura_fahrenheit = ($temperatura * 9/5) + 32;
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    echo "Temperatura: $temperatura °C" . PHP_EOL;
    echo "Temperatura em Fahrenheit: $temperatura_fahrenheit °F" . PHP_EOL;
}
else {
    $temperatura_celsius = ($temperatura - 32) * 5/9;
    echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
    echo "Temperatura: $temperatura °F" . PHP_EOL;
    echo "Temperatura em Celsius: $temperatura_celsius °C" . PHP_EOL;
}
