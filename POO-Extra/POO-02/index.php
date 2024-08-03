<?php

use POO_02\Classes\{Mamifero, Animal, Cachorro, Gato};

require_once "autoload.php";

$gato = new Gato("Julius");
echo $gato->fazerAnimalEmitirSom($gato) . PHP_EOL;

$cachorro = new Cachorro("Caesar");
echo $cachorro->fazerAnimalEmitirSom($cachorro) . PHP_EOL;
