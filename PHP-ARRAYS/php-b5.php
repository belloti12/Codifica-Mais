<?php

function valor_com_desconto($valor, $desconto) 
{
    if ($desconto > 100) {
        echo "Um desconto não pode exceder 100% !!!";
    }
    elseif ($desconto < 0) {
        echo "Descontos negativos não existem !!!";
    }
    else {
        return $valor - $valor * $desconto / 100;
    }
}

echo valor_com_desconto(120, 10);
