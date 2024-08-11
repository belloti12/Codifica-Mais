<?php

class ProdutoPerecivel extends Produto 
{
    private string $validade;

    public function __construct(string $sku, string $nome, string $unidade_medida, int $quantidade, float $preco, string $validade) 
    {
        parent::__construct($sku, $nome, $unidade_medida, $quantidade, $preco);

        $this->validade = VerificaTipo::verificarTipo($validade, "string", "validade");
    }

    // Sobrescreve o método da classe mãe para adicionar os atributos da sub-classe 
    public function colocarAtributosEmArray(): array
    {
        return array_merge(parent::colocarAtributosEmArray(), get_object_vars($this));
    }
}
