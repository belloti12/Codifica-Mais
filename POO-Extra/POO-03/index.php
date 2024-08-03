<?php

require_once "autoload.php";

use POO_03\Classes\{FuncionarioHorista, FuncionarioMensalista};

$horista = new FuncionarioHorista("Johnny", 1123, 58, 13);
echo $horista->exibirInformacoes() . PHP_EOL . PHP_EOL;

$mensalista = new FuncionarioMensalista("Nicholas", 1867);
echo $mensalista->exibirInformacoes();
