<?php

require_once "autoload.php";

$pr = new Produto("12", "1", "1", 1, 12);
// var_dump($pr);

$estoque = new Estoque;

$estoque->adicionarProduto($pr);

var_dump($estoque);
