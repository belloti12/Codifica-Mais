<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../helper.php";


use App\{Controller, CriarPDO};

$pdo = CriarPDO::criarConexao();
$controlador = new Controller($pdo);


// Caso a URL não tenha caminho, o programa redireciona para o caminho padrão de /produtos
// Esse caso acontece quando abrimos o servidor, ou quando acessamos a URL só com o nome do servidor, "localhost:8000"
if (!(array_key_exists("PATH_INFO", $_SERVER))) {
    header('location: /produtos');
}  

// Puxa o caminho da URL
// O caminho não vai dar erro por conta do if lá do começo, o if do começo cuida do caso de não termos caminho na URL
$caminho_path = $_SERVER['PATH_INFO'];


if ($caminho_path == '/produtos') {
    return $controlador->listar();
}
if ($caminho_path == '/produtos/criar') {
    return $controlador->criar();
}
if ($caminho_path == '/produtos/editar') {
    return $controlador->editar($_GET['id-editar']);
}
if ($caminho_path == '/produtos/salvar') {
    return $controlador->salvar();
}
if ($caminho_path == '/produtos/atualizar') {
    return $controlador->atualizar($_GET['id-editar']);
}
if ($caminho_path == '/produtos/deletar') {
    return $controlador->deletar($_GET['id-deletar']);
}

echo "O caminho $caminho_path não foi encontrado !!!";

?>