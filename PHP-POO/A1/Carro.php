<?php

class Carro
{
    private string $situacao;

    // Utilizando a promoção de propriedades no construtor
    public function __construct(
        private string $marca,
        private string $modelo,
        private int $ano_de_fabricacao,
        private string $cor,
        private bool $seguro,
    ) 
    {
        $this->situacao = "Normal";
    }

    // Função auxiliar para transformar o "vazio" em false e o "1" em true nos atributos booleanos, no caso dessa classe, o seguro 
    private function boolean_visivel() : string 
    {
        if ($this->seguro == 1) {
            return "True";
        }
        return "False";
    }

    // Função que imprimi informações sobre o carro
    public function informar() : void
    {
        $seguro = $this->boolean_visivel();
        echo <<<END
        =-=-=-=-= Informações do Carro =-=-=-=-=
        Marca:              $this->marca
        Modelo:             $this->modelo
        Ano de Fabricação:  $this->ano_de_fabricacao
        Cor:                $this->cor
        Situação:           $this->situacao
        Seguro:             $seguro
        END;
    }

    // Função que atualiza a situação do carro para quebrado
    public function bater() : void
    {
        $this->situacao = "Quebrado";
        echo "Seu carro quebrou. A situação do carro é " . $this->situacao;
    }

    // Função do conserto do carro, se o seguro for true, ele executa o conserto, se for false, ela não faz nada
    public function consertar() : void
    {
        if ($this->seguro == true) {
            echo "Seu carro $this->situacao foi para a oficina mecânica. A situação do carro é Normal";
            $this->situacao = "Normal";
            return;
        }       
        echo "Seu carro NÃO tem seguro !, ele continua " . $this->situacao;
    }

    // Função que permite do usuário fazer um seguro.
    public function fazer_seguro() : void
    {
        if ($this->seguro == true) {
            echo "Você ja tem um seguro !";
            return;
        }
        $this->seguro = true;
        echo "Você fez o seguro do carro com sucesso !";
    }

    // Função que recebe a nova cor e troca o atributo "cor" do objeto
    public function trocar_cor(string $cor) : void
    {
        echo "Seu carro era da cor $this->cor e foi pintado para a cor $cor.";
        $this->cor = $cor;
    }
}
