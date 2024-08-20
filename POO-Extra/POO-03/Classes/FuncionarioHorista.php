<?php

namespace POO_03\Classes;

class FuncionarioHorista extends FuncionarioBase 
{
    private int $horasTrabalhadas;
    private float $taxaPorHora;


    public function __construct(string $nome, float $salarioBase, int $horasTrabalhadas, float $taxaPorHora) 
    {
        parent::__construct($nome, $salarioBase);
        $this->horasTrabalhadas = $horasTrabalhadas;
        $this->taxaPorHora = $taxaPorHora;
    }

    public function calcularSalario() : float 
    {
        $bonusPorHora = $this->horasTrabalhadas * $this->taxaPorHora;
        return $this->salarioBase + $bonusPorHora;
    }
    public function exibirInformacoes() : string 
    {
        return <<<END
        Nome:          {$this->nome}
        Salario base:  {$this->salarioBase}
        Salario final: {$this->calcularSalario()}
        END;
    }
}
