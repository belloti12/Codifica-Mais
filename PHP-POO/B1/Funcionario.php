<?php

class Funcionario 
{
    public function __construct(
        private string $nome,
        private string $cargo, 
        private float $salario,
    ) {}

    // Função para alterar o salario positivo de um funcionário
    public function ajustarSalario(float $novoSalario) : void
    {
        if ($novoSalario < 0) {
            echo "Não se pode ter um salário negativo !" . PHP_EOL;
            return;
        }

        $this->salario = $novoSalario;
    }

    // Função para alterar o cargo de um funcionário
    public function alterarCargo(string $novoCargo) : void
    {
        $this->cargo = $novoCargo;
    }

    // Função para exibir detalhes de um funcionário
    public function exibirDetalhes() : string
    {
        return <<<END
        Nome    : $this->nome
        Cargo   : $this->cargo
        Salario : $this->salario
        END;
    }
}

$Funcionario = new Funcionario("Mauro", "Pintor", 2004);
$Funcionario->ajustarSalario(4046);
$Funcionario->alterarCargo("Arquiteto");
echo $Funcionario->exibirDetalhes() . PHP_EOL;
