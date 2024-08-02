<?php

class ProdutoPerecivel extends Produto 
{
    private string $validade;

    public function __construct(string $sku, string $nome, string $unidade_medida, int $quantidade, float $preco, string $validade) 
    {
        parent::__construct($sku, $nome, $unidade_medida, $quantidade, $preco);
        $this->validade = $validade;
    }
}
