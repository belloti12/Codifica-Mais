<?php

namespace Veiculos\Src;

interface VeiculoInterface 
{
    public function acelerar() : void;

    public function frear() : void;

    public function exibirDetalhes() : void;

    public function bater() : void;

    public function consertar() : void;

    public function fazer_seguro() : void;
}
