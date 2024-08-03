<?php

namespace POO_03\Classes;

abstract class FuncionarioBase implements Funcionario 
{
    protected string $nome;
    protected float $salarioBase;

    public function __construct(string $nome, float $salarioBase) 
    {
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
    }

    public function calcularSalario() : float 
    {
        return $this->salarioBase;
    }
    public function exibirInformacoes() : string 
    {
        return <<<END
        Nome:    {$this->nome}
        Salario: {$this->calcularSalario()}
        END;
    }
}
