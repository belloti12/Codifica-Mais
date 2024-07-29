<?php

class ContaBancaria 
{
    private float $saldo;

    public function __construct(
        private string $numero_da_conta,
        private string $nome_do_titular,
    )
    {
        $this->saldo = 0;
    }

    // Função que deposita quantias positivas
    public function depositar(float $quantia) : void
    {
        if ($quantia < 0) {
            echo "Não é possível depositar um valor negativo !" . PHP_EOL;
            return;
        }
        $this->saldo += $quantia;
    }

    // Função que saca quantias positivas e menores que o saldo da conta
    public function sacar(float $quantia) : void
    {
        if ($quantia < 0) {
            echo "Não é possível sacar um valor negativo !" . PHP_EOL;
            return;
        }
        elseif ($quantia > $this->saldo) {
            echo "Não é possível sacar um valor maior do que o do saldo !" . PHP_EOL;
            return;
        }

        $this->saldo -= $quantia;
    }

    // Função que retorna o saldo da conta
    public function exibirSaldo() : float
    {
        return $this->saldo;
    }


}

$ContaBancaria = new ContaBancaria("123", "João Maria");
$ContaBancaria->depositar(1200);
$ContaBancaria->sacar(200);
echo $ContaBancaria->exibirSaldo();
