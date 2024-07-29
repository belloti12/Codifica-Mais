<?php

namespace Veiculos\Src;

use Veiculos\Src\Veiculo;

class Moto extends Veiculo 
{
    public function __construct(string $marca, string $modelo, int $ano_de_fabricacao, string $cor, bool $seguro) 
    {
        parent::__construct($marca, $modelo, $ano_de_fabricacao, $cor, $seguro);
        $this->numero_de_rodas = 2;
    }

    public function buzinar() : void 
    {
        echo "Voce buzinou fraco" . PHP_EOL;
        return;
    }
}