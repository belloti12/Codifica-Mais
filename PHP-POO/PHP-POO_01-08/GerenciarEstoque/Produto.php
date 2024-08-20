<?php 

class Produto implements ProdutoInterface
{  
    private int $id;    
    private string $sku;
    private string $nome;
    private string $unidade_medida;
    private int $quantidade;
    private float $preco;
    protected static int $contagem = 0;
    
    public function __construct(string $sku, string $nome, string $unidade_medida, int $quantidade, float $preco) 
    {
        // Adiciona 1 um ID de cada novo produto
        self::$contagem += 1;

        // Adiciona os valores de construtor, em alguns casos verifica o tipo antes
        // Verificar o tipo na criação do produto nos garante que tudo estará certo no estoque
        // A funcionalidade principal da verificação é diferenciar strings numéricas de não numéricas
        $this->id = self::$contagem;
        $this->sku = VerificaTipo::verificarTipo($sku, "string", "SKU");
        $this->nome = VerificaTipo::verificarTipo($nome, "string", "nome");
        $this->unidade_medida = VerificaTipo::verificarTipo($unidade_medida, "string", "unidade de medida");
        $this->quantidade = VerificaTipo::verificarTipo($quantidade, "int", "quantidade");
        $this->preco = VerificaTipo::verificarTipo($preco, "float", "preco");
    }

    // Método que adiciona todos os atributos em um array, utiliza uma função nativa do PHP para isso
    // A função coloca o nome do atributo na chave e o valor do atributo no valor
    public function colocarAtributosEmArray(): array
    {
        return get_object_vars($this);
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    
    public function getSku(): string
    {
        return $this->sku;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidadeNova): void
    {
        $this->quantidade = $quantidadeNova;
    }
}
