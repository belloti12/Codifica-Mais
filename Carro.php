<?php

class Carro
{
    private string $marca;
    private string $modelo;
    private int $ano_de_fabricacao;
    public string $cor;
    private string $situacao;
    private bool $seguro;

    public function __construct($marca, $modelo, $ano_de_fabricacao, $cor, $situacao, $seguro) 
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano_de_fabricacao = $ano_de_fabricacao;
        $this->cor = $cor;
        $this->situacao = $situacao;
        $this->seguro = $seguro;
    }

    // Função que imprimi informações sobre o carro (objeto)
    public function info()
    {
        return <<<END
        =-=-=-=-= Informações do Carro =-=-=-=-=
        Marca:              $this->marca
        Modelo:             $this->modelo
        Ano de Fabricação:  $this->ano_de_fabricacao
        Cor:                $this->cor
        Situação:           $this->situacao
        Seguro:             $this->seguro
        END;
    }

    // Função da situação do carro caso ocorra uma batida
    public function bateu()
    {
        $this->situacao = "Quebrado";
        return "Seu carro quebrou. A situação do carro é " . $this->situacao;
    }

    // Função do conserto do carro
    public function conserto()
    {
        if ($this->seguro = true) {
            $this->situacao = "Normal";
            return "Seu carro quebrou, mas como voce TEM seguro do carro, ele foi na oficina mecanica. A situação do carro é " . $this->situacao;
        }       
        return "Seu carro NÃO tem seguro !, ele continua quebrado";
    }

    // Função que permite do usuario fazer um seguro.
    public function fazer_seguro()
    {
        if ($this->seguro = true) {
            return "Voce ja tem um seguro!";
        }
        $this->seguro = true;
        return "Voce fez o seguro do carro com sucesso !";
    }
}

$carro = new Carro("a", "b", 1000, "c", "Normal", false);

// var_dump($carro);

echo $carro->info() . PHP_EOL;
echo $carro->bateu() . PHP_EOL;

echo $carro->conserto() . PHP_EOL;

echo $carro->info() . PHP_EOL;
