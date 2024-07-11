<?php

$preco = readline("Qual é o preço da compra?: R$ ");

// Condição para não termos valores negativos para compras
while ($preco < 0) {
    echo "Verifique o valor da compra, não existem compras negativas !!!" . PHP_EOL;
    $preco = readline("Qual é o preço da compra?: R$ ");
}

function calcularDescontoProgressivo($valorCompra) 
{
    if ($valorCompra < 100) {
        return 0;
    }
    elseif ($valorCompra >= 100 && $valorCompra < 500) {
        return 10;
    }
    else {
        return 20;
    }
}

$desconto = calcularDescontoProgressivo($preco);

function aplicarDesconto($valorCompra, $percentualDesconto) 
{
    return $valorCompra - $valorCompra * $percentualDesconto / 100;
}

$valor_final = aplicarDesconto($preco, $desconto);

echo "O valor da compra recebeu $desconto% de desconto, sendo o valor final igual a R$$valor_final";
