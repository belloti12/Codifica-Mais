<?php

namespace POO_03\Classes;

class FuncionarioMensalista extends FuncionarioBase 
{
    public function __construct(string $nome, float $salarioBase) 
    {
        parent::__construct($nome, $salarioBase);
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
