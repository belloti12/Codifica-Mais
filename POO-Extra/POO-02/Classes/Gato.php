<?php

namespace POO_02\Classes;

class Gato extends Mamifero 
{

    public function __construct(string $nome) 
    {
        parent::__construct($nome);
    }

    public function fazerSom() : string 
    {
        return "Miau";
    }
}
