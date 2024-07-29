
<?php

// Importa as classes para o arquivo index
use Veiculos\Src\{Caminhao, Carro, Moto};

require_once "autoload.php";

$caminhao = new Caminhao("Volvo", "FH 16", 2023, "Prata", false);
$carro = new Carro("Toyota", "Corolla", 2024, "Branco", true);
$moto = new Moto("Honda", "CB 500F", 2024, "Vermelho", false);

$veiculos = [$caminhao, $carro, $moto];

// A diferença entres os tipos de veiculo são:

// A força da buzina (dada como echo, ainda sem necessidade pratica de armazenar em uma variável)
foreach ($veiculos as $veiculo) {
    $veiculo->buzinar();
}

echo PHP_EOL;

// O número de rodas, exibida nos detalhes do veiculo
$caminhao->exibirDetalhes() . PHP_EOL;
echo PHP_EOL;
$carro->exibirDetalhes() . PHP_EOL;
echo PHP_EOL;
$moto->exibirDetalhes() . PHP_EOL;
