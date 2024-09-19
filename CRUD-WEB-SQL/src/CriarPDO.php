<?php

namespace App;
use PDO;

class CriarPDO 
{
    public static function criarConexao(): PDO
    {
        $pdo = new PDO("mysql:host=localhost;dbname=db_produtos",'root','belloti12');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}
