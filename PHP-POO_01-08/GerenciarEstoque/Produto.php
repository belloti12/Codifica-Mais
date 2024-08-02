<?php 

class Produto implements ProdutoInterface
{
    private string $sku;
    private string $nome;
    private string $unidade_medida;
    private int $quantidade;
    private float $preco;
    
    public function __construct(string $sku, string $nome, string $unidade_medida, int $quantidade, float $preco) 
    {
        // $this->verificaTipo($sku, "string");
        $this->sku = $sku;
        $this->nome = $nome;
        $this->unidade_medida = $unidade_medida;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    public function getNome(){
        return $this->nome;
    }
    
    public function getSku(){
        return $this->sku;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidadeNova)
    {
        $this->quantidade = $quantidadeNova;
    }

    // protected function verificaTipo($dado, string $tipo)
    // {
    //     while (gettype($dado) != $tipo) {
    //         $dado = readline("O campo deve ser estar em $tipo! Tente novamente: ");
    //     }
    //     return $dado;
    // }
}
