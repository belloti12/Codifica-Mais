<?php

$notasAlunos = [
    "Aluno_1" => [8.5, 6.0, 7.8, 9.2, 5.5],
    "Aluno_2" => [7.0, 8.0, 6.5, 7.5, 8.5],
    "Aluno_3" => [6.5, 7.5, 4.5, 5.5, 7.0],
    "Aluno_4" => [5.0, 4.6, 7.8, 9.0, 6.0],
    ];

function calcularMedia($notas) 
{
    $soma_notas = 0;
    foreach ($notas as $nota) {
        $soma_notas += $nota;
    }
    return $soma_notas / count($notas);
}

$soma_aprovados = 0;
$soma_reprovados = 0;

foreach ($notasAlunos as $aluno => $notas) {
    if (calcularMedia($notas) >= 7) {
        echo "O aluno $aluno foi aprovado!, sua média foi " . calcularMedia($notasAlunos[$aluno]) . PHP_EOL;
        $soma_aprovados += 1;
    }
    else {
        echo "O aluno $aluno NÃO foi aprovado, sua média foi " . calcularMedia($notasAlunos[$aluno]) . PHP_EOL;
        $soma_reprovados += 1;
    }
}

echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
echo "Aprovados: $soma_aprovados" . PHP_EOL;
echo "Reprovados: $soma_reprovados" . PHP_EOL;
