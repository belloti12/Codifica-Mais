
<?php

$peso = readline("Qual é o seu peso? [Kg]: ");
$altura = readline("Qual é a sua altura? [m]: ");

$imc = $peso / ($altura * $altura);


if ($imc < 18.5) {
    $situacao = "Magreza";
}
elseif ($imc >= 18.5 && $imc <= 24.9) {
    $situacao = "Normalidade";
}
elseif ($imc >= 25 && $imc <= 29.9) {
    $situacao = "Sobrepeso";
}
elseif ($imc >= 30 && $imc <= 34.9) {
    $situacao = "Obesidade Grau I";
}
elseif ($imc >= 35 && $imc <= 39.9) {
    $situacao = "Obesidade Grau II";
}
else {
    $situacao = "Obesidade Grau III";
}

echo "Seu IMC é $imc, o que te deixa em estado de $situacao";
