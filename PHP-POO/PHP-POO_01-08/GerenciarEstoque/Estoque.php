<?php

class Estoque 
{
    private array $estoque;

    // Construtor para começar um novo estoque sem nada
    public function __construct() 
    {
        $this->estoque = [];
    }

    // Método que adiciona produtos no estoque
    public function adicionarProduto(Produto $produto) : void
    {
        // Verifica o SKU informado pelo usuário, se já existir ele para logo em seguida
        if ($this->verificarSku($produto->getSku()) == true) {
            echo "Esse produto ja consta no estoque!, o SKU {$produto->getSku()} ja existe!" . PHP_EOL;
            return;
        }

        // Adiciona o produto no estoque
        $this->estoque[] = $produto;
        echo "O produto {$produto->getNome()}, de codigo SKU {$produto->getSku()} foi adicionado no estoque" . PHP_EOL;
        return;
    }

    // Método que verifica a existência de um SKU no estoque
    private function verificarSku(string $sku) : bool
    {
        // Variável lógica para conferir se o SKU informado existe
        $existe = false;

        // Utiliza um foreach para verificar se o SKU existe no estoque
        foreach ($this->estoque as $produtoTeste) {
            if ($produtoTeste->getSku() == $sku) {
                // A variável passa a ser true já que o SKU existe no estoque
                $existe = true;
            }
        }
        
        return $existe;
    }

    // Método que retorna o endereço do produto de um determinado SKU
    private function acharObjetoDoSku(string $sku)
    {
        // Utiliza um foreach para achar o objeto que tem o SKU desejado
        foreach ($this->estoque as $produtoTeste) {
            if ($produtoTeste->getSku() == $sku) {
                return $produtoTeste;
            }
        }
    }

    // Método para vender produtos
    public function venderProduto(string $sku, int $quantidadeVendida) : void
    {
        // Verifica primeiro se o SKU existe
        if ($this->verificarSku($sku) == false) {
            echo "Esse SKU não existe. Não tem nenhum produto no estoque com o SKU $sku" . PHP_EOL;
            return;
        }

        // Armazena o endereço do objeto em uma variável
        $produto = $this->acharObjetoDoSku($sku);

        // Variáveis para facilitar o uso dos "echo"s
        $quantidade = $produto->getQuantidade();
        $nome = $produto->getNome();

        // Para o caso do estoque ser esgotado
        if ($quantidade - $quantidadeVendida == 0) {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O produto {$nome} de código SKU $sku foi esgotado, portanto, foi zerado do estoque" . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            $produto->setQuantidade(0);
            return;
        }

        // Quantidades negativas não existem
        elseif ($quantidade - $quantidadeVendida < 0) {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "Voce vendeu mais produtos do que o estoque!, só existem $quantidade no estoque!" . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            return;
        }

        // Se a variação da quantidade for possível e diferente de 0
        else {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O estoque do produto $nome foi atualizada de $quantidade para " . ($quantidade - $quantidadeVendida) . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            $produto->setQuantidade($quantidade - $quantidadeVendida);
            return;
        }
    }

    // Método que imprimi todos os produtos do estoque
    public function listarEstoque() : void
    {
        // Utiliza um foreach no estoque para listar todos os objetos dele
        foreach ($this->estoque as $produto) {

            // Chama a função que imprimi os detalhes do produto
            $this->listarItemEspecifico($produto->getSku());
            echo PHP_EOL;
        }
    }

    // Método que imprimi o produto do determinado SKU
    public function listarItemEspecifico(string $sku) : void
    {
        // Verifica primeiro se o SKU existe
        if ($this->verificarSku($sku) == false) {
            echo "Esse SKU não existe. Não tem nenhum produto no estoque com o SKU $sku" . PHP_EOL;
            return;
        }

        // Armazena o endereço do objeto em uma variável
        $produto = $this->acharObjetoDoSku($sku);

        
        // Utiliza o método da classe Produto (ou sub-classes) para guardar todos os atributos (e seus valores) em um array
        $arrayDeAtributos = $produto->colocarAtributosEmArray();

        // Utiliza um foreach nesse array de atributos e imprimi todos eles em ordem
        foreach ($arrayDeAtributos as $key => $valor) {
            echo "$key: $valor | ";
        }
    }

    // Método que atualiza a quantidade de um produto de determinado SKU
    public function atualizarProduto(string $sku, int $quantidadeNova) : void
    {
        // Verifica primeiro se o SKU existe
        if ($this->verificarSku($sku) == false) {
            echo "Esse SKU não existe. Não tem nenhum produto no estoque com o SKU $sku" . PHP_EOL;
            return;
        }

        // Armazena o endereço do objeto em uma variável
        $produto = $this->acharObjetoDoSku($sku);
        
        echo "A quantidade do produto de código SKU $sku, foi atualizada de {$produto->getQuantidade()} para $quantidadeNova" . PHP_EOL;

        $produto->setQuantidade($quantidadeNova);
    }

    // Método que imprimi a quantidade de produtos do estoque e a soma de suas quantidades
    public function informarQuantidades() : void
    {
        $soma_quantidade = 0;

        $quantidade_de_produtos = count($this->estoque);

        foreach ($this->estoque as $produto) {
            $soma_quantidade += $produto->getQuantidade();
        }

        echo "Há $quantidade_de_produtos produtos no estoque" . PHP_EOL;
        echo "A soma das quantidades de produtos totais é $soma_quantidade" . PHP_EOL;
    }

    // Método que deleta um produto
    public function deletarProduto(string $sku) : void
    {
        // Verifica primeiro se o SKU existe
        if ($this->verificarSku($sku) == false) {
            echo "Esse SKU não existe. Não tem nenhum produto no estoque com o SKU $sku" . PHP_EOL;
            return;
        }

        // Armazena o endereço do objeto em uma variável
        $produto = $this->acharObjetoDoSku($sku);
        
        $quantidade = $produto->getQuantidade();
        $nome = $produto->getNome();

        // Se a quantidade for 0 o programa deleta sem perguntar nada ao usuário, se for maior que 0 ele confirma com o usuário
        if ($quantidade != 0) {
            $resposta = trim(readline("O produto $nome ainda tem o estoque de $quantidade, deseja mesmo deleta-lo? [S/N]: "));
        }
        else {
            $resposta = "S";
        }

        if (strtoupper($resposta)[0] == "S") {
            echo "O produto de código SKU $sku foi deletado do estoque." . PHP_EOL;

            // Utiliza um foreach no estoque até achar o índice do produto a ser deletado
            foreach ($this->estoque as $key => $produto) {
                if ($produto->getSku() == $sku) {
                    unset($this->estoque[$key]);
                }
            }
        }
    }    
}
