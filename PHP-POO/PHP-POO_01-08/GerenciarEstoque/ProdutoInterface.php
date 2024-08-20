<?php

interface ProdutoInterface 
{
    public function getNome(): string;
    public function getSku(): string;
    public function getQuantidade(): int;
}
