
<?php

class Produto 
{
    public function __construct(
        private string $nome,
        private float $preco,
        private int $quantidade_no_estoque,
    ) {}

    // Função para alterar o preço positivo de um produto
    public function alterarPreco(float $novoPreco) : void
    {
        if ($novoPreco < 0) {
            echo "Não se pode ter um preço negativo !" . PHP_EOL;
            return;
        }

        $this->preco = $novoPreco;
    }

    // Função para alterar a quantidade positiva em estoque de um produto
    public function ajustarEstoque($quantidade) : void
    {
        if ($quantidade < 0) {
            echo "Não se pode ter uma quantidade negativa em estoque !" . PHP_EOL;
            return;
        }

        $this->quantidade_no_estoque = $quantidade;
    }

    // Função para exibir detalhes de um produto
    public function exibirDetalhes() : string
    {
        return <<<END
        Nome                  : $this->nome
        Preço                 : $this->preco
        Quantidade em Estoque : $this->quantidade_no_estoque
        END;
    }
}


$Produto = new Produto("Chiclete", 0.5, 100);
$Produto->alterarPreco(0.2);
$Produto->ajustarEstoque(10);
echo $Produto->exibirDetalhes() . PHP_EOL;
