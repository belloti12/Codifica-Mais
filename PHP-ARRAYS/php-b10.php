<?php

$funcionarios = [
    "Pedro" => [
        "Salário Base" => 2500,
        "Horas Extras" => 10
    ],
    "Renata" => [
        "Salário Base" => 3000,
        "Horas Extras" => 5
    ],
    "Sérgio" => [
        "Salário Base" => 2800,
        "Horas Extras" => 8
    ],
    "Vanessa" => [
        "Salário Base" => 3200,
        "Horas Extras" => 12
    ],
    "André" => [
        "Salário Base" => 1700,
        "Horas Extras" => 0
    ]
];

function calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra) 
{
    return $salarioBase += $horasExtras * $valorHoraExtra;
}

function listarFuncionarios($funcionarios) 
{
    foreach ($funcionarios as $nome => $dados) {

        // Seta o valor do salario e a quantidade de horas extras em variaveis propias
        $salario = $dados["Salário Base"];
        $horas_extras = $dados["Horas Extras"];

        // Calcula o valor da hora normal e o valor da hora extra
        $valor_hora_normal = $salario / 160;
        $valor_hora_extra = $valor_hora_normal * 1.5;

        // Chama a função de calculo do salario total, e essa leva como paramentro os valores calculados anteriormente
        $salario_total = calcularSalarioTotal($salario, $horas_extras, $valor_hora_extra);

        echo "=-=-=-=-= $nome =-=-=-=-=" . PHP_EOL;
        echo "Salario Base: $salario" . PHP_EOL;
        echo "Horas Extras: $horas_extras" . PHP_EOL;
        echo "Salario Total: $salario_total" . PHP_EOL;
        echo PHP_EOL;
    }
}

listarFuncionarios($funcionarios);
