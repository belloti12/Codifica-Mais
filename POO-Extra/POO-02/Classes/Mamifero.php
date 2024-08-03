<?php

namespace POO_02\Classes;

class Mamifero implements Animal 
{
    protected string $nome;

    public function __construct(string $nome) 
    {
        $this->nome = $nome;
    }

    public function fazerSom()
    {
        return;
    }

    public function fazerAnimalEmitirSom(Animal $animal) 
    {
        return $animal->fazerSom();
    }
}
