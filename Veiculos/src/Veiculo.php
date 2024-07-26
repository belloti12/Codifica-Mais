<?php

namespace Veiculos\Src;

abstract class Veiculo implements VeiculoInterface
{
    protected string $marca;
    protected string $modelo;
    protected int $ano_de_fabricacao;
    protected string $cor;
    protected bool $seguro;
    protected int $numero_de_rodas;
    protected string $situacao;

    public function __construct(string $marca, string $modelo, int $ano_de_fabricacao, string $cor, bool $seguro) 
    {
        $this->marca = $marca;
        $this->modelo = $modelo; 
        $this->ano_de_fabricacao = $ano_de_fabricacao; 
        $this->cor = $cor;
        $this->seguro = $seguro;
        $this->situacao = "Normal";
    }

    public function acelerar() : void
    {
        echo "Seu veiculo acelerou" . PHP_EOL;
    }

    public function frear() : void
    {
        echo "Seu veiculo freou" . PHP_EOL;
    }

    // Função auxiliar para transformar o "vazio" em false e o "1" em true nos atributos booleanos, no caso dessa classe, o seguro 
    private function boolean_visivel() : string 
    {
        if ($this->seguro == 1) {
            return "True";
        }
        return "False";
    }

    // Função que imprimi informações sobre o veiculo
    public function exibirDetalhes() : void
    {
        $seguro = $this->boolean_visivel();
        echo <<<END
        =-=-=-=-= Informações do Veiculo =-=-=-=-=
        Marca:              $this->marca
        Modelo:             $this->modelo
        Ano de Fabricação:  $this->ano_de_fabricacao
        Cor:                $this->cor
        Situação:           $this->situacao
        Seguro:             $seguro
        Número de Rodas:    $this->numero_de_rodas
        END;
    }

    // Função que atualiza a situação do veiculo para quebrado
    public function bater() : void
    {
        $this->situacao = "Quebrado";
        echo "Seu veiculo quebrou. A situação do veiculo é " . $this->situacao . PHP_EOL;
    }

    // Função do conserto do veiculo, se o seguro for true, ele executa o conserto, se for false, ela não faz nada
    public function consertar() : void
    {
        if ($this->seguro == true) {
            echo "Seu veiculo $this->situacao foi para a oficina mecânica. A situação do veiculo é Normal" . PHP_EOL;
            $this->situacao = "Normal";
            return;
        }       
        echo "Seu veiculo NÃO tem seguro !, ele continua " . $this->situacao . PHP_EOL;
    }

    // Função que permite do usuário fazer um seguro.
    public function fazer_seguro() : void
    {
        if ($this->seguro == true) {
            echo "Você ja tem um seguro !" . PHP_EOL;
            return;
        }
        $this->seguro = true;
        echo "Você fez o seguro do veiculo com sucesso !" . PHP_EOL;
    }

    // Função que recebe a nova cor e troca o atributo "cor" do objeto
    public function trocar_cor(string $cor) : void
    {
        echo "Seu veiculo era da cor $this->cor e foi pintado para a cor $cor." . PHP_EOL;
        $this->cor = $cor;
    }

    public function buzinar() : void 
    {
        echo "Voce buzinou" . PHP_EOL;
        return;
    }
}
