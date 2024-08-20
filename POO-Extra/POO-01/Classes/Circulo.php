<?php

namespace Classes;

class Circulo extends Forma
{
    private float $raio;


    public function __construct(float $raio) 
    {
        $this->nome = "Circulo";
        $this->raio = $raio;
    }

    public function calcularArea(): float 
    {
        return 3.14 * ($this->raio)**2;
    }

    public function calcularPerimetro() : float
    {
        return 2 * 3.14 * $this->raio;
    }

    public function info() 
    {
        return <<<END
        =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        Polígono:  $this->nome
        Raio:      $this->raio
        Área:      {$this->calcularArea()}
        Perímetro: {$this->calcularPerimetro()}
        =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        END;
    }
}
