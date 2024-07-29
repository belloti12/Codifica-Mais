<?php

namespace Veiculos\Src;

class Caminhao extends Veiculo 
{
    public function __construct(string $marca, string $modelo, int $ano_de_fabricacao, string $cor, bool $seguro) 
    {
        parent::__construct($marca, $modelo, $ano_de_fabricacao, $cor, $seguro);
        $this->numero_de_rodas = 6;
    }

    public function buzinar() : void 
    {
        echo "Você buzinou forte" . PHP_EOL;
        return;
    }
}
