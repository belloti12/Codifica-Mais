<?php
    session_start();
    // Inicia a sessão

    require_once __DIR__ . "/../vendor/autoload.php";
    use App\Controller;

    // session_start();

    // require_once '\\..\\src\\Views\\array.php';

    $controlador = new Controller();



    // Define o array de categorias, unidades de medida e produtos
    $_SESSION['categorias'] = [
        '1' => 'Eletrônicos',
        '2' => 'Eletrodomésticos',
        '3' => 'Móveis',
        '4' => 'Decoração',
        '5' => 'Vestuário',
        '6' => 'Outros'
    ];

    $_SESSION['unidades_medidas'] = [
        '1' => 'Un',
        '2' => 'Kg',
        '3' => 'g',
        '4' => 'L',
        '5' => 'mm',
        '6' => 'cm',
        '7' => 'm',
        '8' => 'm²',
    ];

    
    // $caminho_path = parse_url($_SERVER['REQUEST_URI'])['path'];
    // $caminho_query = parse_url($_SERVER['REQUEST_URI'])['query'];
    
    // var_dump(strpos('?', $_SERVER['REQUEST_URI']));

    // if (str_contains($_SERVER['REQUEST_URI'], "?")) {
    //     var_dump($_SERVER['QUERY_STRING']);
    // }

    // if (isset(parse_url($_SERVER['REQUEST_URI']['query']))) {

    // }

    // var_dump(parse_url($_SERVER['REQUEST_URI']));
    // var_dump(parse_url($_SERVER['REQUEST_URI'])['path']);
    // var_dump(parse_url($_SERVER['REQUEST_URI'])['query']);


    $caminho_path = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : '/';

    $caminho_query = (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : '';


    // var_dump($caminho_query);
    // var_dump("Vai buscar?");
    // var_dump($caminho_query != 'busca=' && $caminho_query != "");
    // var_dump(str_contains($caminho_query, "busca=") && $caminho_query != "busca=");


    // var_dump($_SERVER['PATH_INFO']);
    // var_dump($_SERVER['QUERY_STRING']);
    

    // var_dump($caminho_path);
    // var_dump($caminho_query);

    if ($caminho_path == '/formulario') {
        return $controlador->criar();
    }
    // if ($caminho_path == '/editar') {
    //     return $controlador->editar();
    // }
    if (str_contains($caminho_query, "id-busca=") && $caminho_query != "id-busca=") {
        // return $controlador->buscar();
    }
    if ($caminho_path == '/') {
        return $controlador->listar();
    }

    echo "O caminho $caminho_path $caminho_query não foi encontrado !!!";



    // $caminho = __DIR__ . "\\..\\src\\Views\\formulario.php";
    // header('Location: \\..\\src\\Views\\listagem.php');

    // $_SESSION['produtos'] no arquivo array.php

    // $_SESSION['produtos'] = [
    //     [
    //         'id' => 1,
    //         'nome' => 'Smartphone',
    //         'sku' => '123456',
    //         'unidade_medida_id' => '1',
    //         'valor' => 1500.00,
    //         'quantidade' => 10,
    //         'categoria_id' => '1',
    //     ],[
    //         'id' => 2,
    //         'nome' => 'Geladeira',
    //         'sku' => '123457',
    //         'unidade_medida_id' => '2',
    //         'valor' => 2500.00,
    //         'quantidade' => 5,
    //         'categoria_id' => '2',
    //     ],
    // ];


    // $caminho = __DIR__ . "\\..\\src\\Views\\formulario.php";
    // var_dump($caminho);
    // exit();
    // Redireciona para a página de listagem

?>
