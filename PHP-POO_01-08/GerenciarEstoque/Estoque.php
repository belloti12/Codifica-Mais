<?php

class Estoque 
{
    private array $estoque;

    public function adicionarProduto(Produto $produto) 
    {
        $this->estoque[] = $produto;
        echo "O produto {$produto->getNome()}, de codigo SKU {$produto->getSku()} foi adicionado no estoque" . PHP_EOL;
        return;
    }

    public function venderProduto(string $sku, int $quantidadeVendida)
    {
        $quantidade = array_search($msku, $estoque)

        if ($quantidade - $quantidadeVendida == 0) {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O produto {$produto->getNome()}, de codigo SKU {$produto->getSku()}, foi esgotado, portanto foi zerado do estoque" . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;

        }

    }

        $quantidade = trim(readline("Quantidade de {$estoque[$codigo]["nome"]} que voce vendeu: "));

        $produto = $estoque[$codigo]["nome"];
        $quantidade_velha = $estoque[$codigo]["quantidade"];

        // Para o caso do estoque ser esgotado
        if ($quantidade_velha - $quantidade == 0) {
            $estoque[$codigo]["quantidade"] = 0;
            echo "..." . PHP_EOL;            
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O produto " . $produto . ", de codigo SKU " . $sku . " foi esgotado, portanto foi zerado" . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            break;
        }
        // Quantidades negativas não existem
        elseif ($quantidade_velha - $quantidade < 0) {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "Voce vendeu mais produtos do que o estoque!, só existem $quantidade_velha no estoque!" . PHP_EOL;
            echo "Tente novamente!!!" . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            continue;
        }

        // Se a quantidade for possivel e diferente de 0
        else {
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            echo "O estoque do $produto foi atualizada de $quantidade_velha para " . $quantidade_velha - $quantidade . PHP_EOL;
            echo "=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=" . PHP_EOL;
            $estoque[$codigo]["quantidade"] = $quantidade_velha - $quantidade;
            break;
        }
    }
}

}

