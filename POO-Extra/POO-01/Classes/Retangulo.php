<?php

namespace Classes;

class Retangulo extends Forma 
{
    private float $altura;
    private float $comprimento;


    public function __construct(float $altura, float $comprimento) 
    {
        $this->nome = "Retangulo";
        $this->altura = $altura;
        $this->comprimento = $comprimento;
    }

    public function calcularArea(): float 
    {
        $area = 0;
        return $this->altura * $this->comprimento;
    }

    public function CalcularPerimetro() : float
    {
        return 2 * $this->altura + 2 * $this->comprimento;
    }

    public function info() 
    {
        return <<<END
        =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        Polígono:    $this->nome
        Altura :     $this->altura
        Comprimento: $this->comprimento
        Área:        {$this->calcularArea()}
        Perímetro:   {$this->calcularPerimetro()}
        =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        END;
    }
}
